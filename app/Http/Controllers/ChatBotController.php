<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatBotController extends Controller
{
    public function handle(Request $request)
    {
        $message = $request->input('message');
        if (!$message) {
            return response()->json(['reply' => 'Pesan tidak boleh kosong.'], 400);
        }

        $apiKey = env('GEMINI_API_KEY');

        // Rule-based keyword matching or fallback if no API key
        if (!$apiKey) {
            return response()->json([
                'reply' => $this->getLocalReply($message)
            ]);
        }

        try {
            $systemInstruction = "Anda adalah Asisten Virtual RSU Pekerja (Rumah Sakit Umum Pekerja) bernama 'Pekerja Care'. Jawab pertanyaan pengguna dengan ramah, sopan, membantu, dan singkat dalam bahasa Indonesia. Informasi RSU Pekerja: UGD/Emergency 24 Jam telp (021) 29484848, Pendaftaran online rawat jalan via WhatsApp di 0857-7778-9022 (Marketing), Lokasi di Jl. Raya Cakung Cilincing No. 46, Sukapura, Jakarta Utara. Kami melayani pasien umum, JKN / BPJS Kesehatan, dan BPJS Ketenagakerjaan. Jangan berikan diagnosis medis formal, tapi berikan panduan umum dan sarankan periksa ke dokter spesialis RSU Pekerja jika dibutuhkan.";

            $response = Http::withoutVerifying()->timeout(15)->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key={$apiKey}", [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $message]
                        ]
                    ]
                ],
                'systemInstruction' => [
                    'parts' => [
                        ['text' => $systemInstruction]
                    ]
                ]
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;
                if ($reply) {
                    // Convert markdown double asterisks to strong tags for simple formatting in chat
                    $reply = str_replace(['**', '*'], ['<strong>', '</strong>'], $reply);
                    return response()->json(['reply' => nl2br($reply)]);
                }
            }

            if ($response->status() === 429 || str_contains($response->body(), 'RESOURCE_EXHAUSTED') || str_contains($response->body(), 'Quota exceeded')) {
                return response()->json([
                    'reply' => $this->getLocalReply($message)
                ]);
            }

            return response()->json([
                'reply' => $this->getLocalReply($message)
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'reply' => $this->getLocalReply($message)
            ]);
        }
    }

    private function getLocalReply($message)
    {
        $msg = strtolower($message);

        if (str_contains($msg, 'bpjs') || str_contains($msg, 'jkn') || str_contains($msg, 'asuransi')) {
            return "RSU Pekerja menerima pasien peserta JKN / BPJS Kesehatan dan BPJS Ketenagakerjaan. Untuk berobat jalan non-darurat, silakan bawa Kartu BPJS/KIS aktif, KTP, dan Surat Rujukan asli dari FKTP (Puskesmas/Klinik).";
        }

        if (str_contains($msg, 'jadwal') || str_contains($msg, 'dokter') || str_contains($msg, 'spesialis')) {
            return "Jadwal praktik dokter spesialis kami dapat Anda temukan pada bagian 'Jadwal Praktik' di halaman utama website ini. Untuk pendaftaran rawat jalan online, Anda dapat mendaftar via WhatsApp di 0857-7778-9022.";
        }

        if (str_contains($msg, 'ugd') || str_contains($msg, 'darurat') || str_contains($msg, 'ambulance') || str_contains($msg, 'ambulan')) {
            return "Layanan UGD dan Farmasi kami siaga 24 jam sehari. Untuk keadaan darurat medis atau penjemputan ambulans, segera hubungi nomor UGD Emergency kami di (021) 29484848.";
        }

        if (str_contains($msg, 'daftar') || str_contains($msg, 'registrasi') || str_contains($msg, 'wa') || str_contains($msg, 'whatsapp')) {
            return "Pendaftaran rawat jalan online dapat dilakukan melalui WhatsApp resmi kami di nomor 0857-7778-9022. Silakan sebutkan nama, poli spesialis tujuan, dan jenis penjaminan Anda.";
        }

        if (str_contains($msg, 'lokasi') || str_contains($msg, 'alamat') || str_contains($msg, 'peta')) {
            return "RSU Pekerja berlokasi di Jl. Raya Cakung Cilincing No. 46, Sukapura, Cilincing, Jakarta Utara, DKI Jakarta 14140. Lokasi peta Google Maps interaktif tersedia di bagian bawah halaman utama.";
        }

        return "Halo! Saya Asisten Virtual RSU Pekerja. Ada yang bisa saya bantu? Anda bisa bertanya mengenai pendaftaran BPJS, jadwal dokter, layanan UGD 24 jam, atau lokasi kami.";
    }
}
