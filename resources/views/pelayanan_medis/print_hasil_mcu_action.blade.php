<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="text/html" http-equiv="Content-Type">
    <title>RS Umum Pekerja</title>
    <style>
        {!! file_get_contents(public_path('assets/css/print.css')) !!}
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
</head>

<body style="margin-right: 30px !important">
    <div class="container-fluid">
        <table class="table table-borderless mb-0">
            <tr>
                <td align="right" style="white-space: nowrap;" width="20%"><img height="130px" src="{{ public_path('assets/img/logo/logo-rs.png') }}"></td>
                <td>
                    <h3 style="margin: 15px; padding: 0;">Rumah Sakit Umum Pekerja</h3>
                    <h6 style="margin: 15px; padding: 0;">
                        Jl. Tipar Cakung No. 46, RT. 2 / RW. 1
                        <br>
                        Sukapura, Kec. Cilincing, Kota Jakarta Utara
                        <br>
                        Daerah Khusus Ibukota Jakarta 14140
                        <br>
                        Telp. (021) 29484848
                    </h6>
                </td>
            </tr>
        </table>
        <hr style="border-style: solid; border-width: 3px">
        <div class="row">
            <div class="col-12 text-center">
                <h2>HASIL PEMERIKSAAN KESEHATAN</h2>
            </div>
        </div>
        <br>
        <table cellpadding="20" style="width: 100%;">
            <tr>
                <td class="text-end">Nama Pasien</td>
                <td>:</td>
                <td class="fw-bold" width="60%">{{ $identitas->nama_pasien }}</td>
            </tr>
            <tr>
                <td class="text-end">No. Medical Record</td>
                <td>:</td>
                <td class="fw-bold">{{ $identitas->no_mr }}</td>
            </tr>
            <tr>
                <td class="text-end">Tanggal Lahir</td>
                <td>:</td>
                <td class="fw-bold">{{ $identitas->tempat_lahir }},
                    {{ date('d/m/Y', strtotime($identitas->tanggal_lahir)) }}</td>
            </tr>
            <tr>
                <td class="text-end">Umur</td>
                <td>:</td>
                <td class="fw-bold">
                    {{ $identitas->tahun_lahir != 0 ? $identitas->tahun_lahir . ' Tahun' : '' }}
                    {{ $identitas->bulan_lahir != 0 ? $identitas->bulan_lahir . ' Bulan' : '' }}
                </td>
            </tr>
            <tr>
                <td class="text-end">Jenis Kelamin</td>
                <td>:</td>
                <td class="fw-bold">{{ $identitas->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td class="text-end" style="width: 45%;">Tanggal Pemeriksaan</td>
                <td class="fit-content">:</td>
                <td class="fw-bold" style="width: 55%;">{{ date('d/m/Y', strtotime($identitas->tanggal_masuk)) }}</td>
            </tr>
            <tr>
                <td class="text-end">Nasabah</td>
                <td>:</td>
                <td class="fw-bold">{{ $identitas->nama_nasabah }}</td>
            </tr>
        </table>
        <div class="pagebreak">&nbsp;</div>
        <div class="row">
            <div class="col-12">
                <h4 style="margin: 0; padding: 0;">Tanda Vital</h4>
                <table class="table table-borderless">
                    <tr>
                        <td class="fit-content">Jenis Pekerjaan</td>
                        <td class="fit-content px-3">:</td>
                        <td>{{ $tanda_vital_mcu->jenis_pekerjaan ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Tensi</td>
                        <td class="px-3">:</td>
                        <td>{{ $tanda_vital_mcu->sistolik ?? '' }} / {{ $tanda_vital_mcu->diastolik ?? '' }} mmHg
                        </td>
                    </tr>
                    <tr>
                        <td>Nadi</td>
                        <td class="px-3">:</td>
                        <td>{{ $tanda_vital_mcu->nadi ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Pernapasan</td>
                        <td class="px-3">:</td>
                        <td>{{ $tanda_vital_mcu->pernapasan ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Suhu</td>
                        <td class="px-3">:</td>
                        <td>{{ $tanda_vital_mcu->suhu ?? '' }} &deg;C</td>
                    </tr>
                    <tr>
                        <td>Tinggi Badan</td>
                        <td class="px-3">:</td>
                        <td>{{ $tanda_vital_mcu->tinggi_badan ?? '' }} Cm</td>
                    </tr>
                    <tr>
                        <td>Berat Badan</td>
                        <td class="px-3">:</td>
                        <td>{{ $tanda_vital_mcu->berat_badan ?? '' }} Kg</td>
                    </tr>
                    @php
                        $tinggi_cm = $tanda_vital_mcu->tinggi_badan ?? 0;
                        $berat_kg = $tanda_vital_mcu->berat_badan ?? 0;

                        if ($tinggi_cm > 0 && $berat_kg > 0) {
                            $tinggi_m = $tinggi_cm / 100;
                            $bmi = round($berat_kg / ($tinggi_m * $tinggi_m), 2);
                            // Kategori BMI WHO
                            if ($bmi < 18.5) {
                                $kategori = 'Underweight';
                            } elseif ($bmi < 23) {
                                $kategori = 'Normal';
                            } elseif ($bmi < 25) {
                                $kategori = 'Overweight';
                            } elseif ($bmi < 30) {
                                $kategori = 'Obesity Class I';
                            } else {
                                $kategori = 'Obesity Class II';
                            }
                        } else {
                            $bmi = '-';
                            $kategori = '-';
                        }
                    @endphp
                    <tr>
                        <td>BMI</td>
                        <td class="px-3">:</td>
                        <td>{{ $bmi }} ( {{ $kategori }} )</td>
                    </tr>
                </table>
                <h4 style="margin: 0; padding: 0;">Mata</h4>
                <table class="table table-borderless">
                    <tr>
                        <td>AVOD</td>
                        <td class="px-3">:</td>
                        <td>{{ $visus_mata->avod ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>AVOS</td>
                        <td class="px-3">:</td>
                        <td>{{ $visus_mata->avos ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>C</td>
                        <td class="px-3">:</td>
                        <td>{{ $visus_mata->cylinder ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>ADD</td>
                        <td class="px-3">:</td>
                        <td>{{ $visus_mata->add ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>PD</td>
                        <td class="px-3">:</td>
                        <td>{{ $visus_mata->pd ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>TOD</td>
                        <td class="px-3">:</td>
                        <td>{{ $visus_mata->tod ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>TOS</td>
                        <td class="px-3">:</td>
                        <td>{{ $visus_mata->tos ?? '' }}</td>
                    </tr>
                    <tr>
                        <td class="fit-content">Buta Warna</td>
                        <td class="fit-content px-3">:</td>
                        <td>{{ $visus_mata->buta_warna ?? '' }}</td>
                    </tr>
                </table>
                <h4 style="margin: 0; padding: 0;">Pemeriksaan Dokter</h4>
                <table class="table table-borderless">
                    <tr>
                        <td>Dokter Pemeriksa</td>
                        <td class="px-3">:</td>
                        <td>{{ $pemeriksaan_spesialis->nama_dokter ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Riwayat Penyakit</td>
                        <td class="px-3">:</td>
                        <td>{{ $pemeriksaan_spesialis->riwayat_penyakit ?? '' }}</td>
                    </tr>
                    <tr>
                        <td class="fit-content">Keluhan Sekarang</td>
                        <td class="fit-content px-3">:</td>
                        <td>{{ $pemeriksaan_spesialis->keluhan_saat_ini ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Kepala</td>
                        <td class="px-3">:</td>
                        <td>{{ $pemeriksaan_spesialis->kepala ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Leher</td>
                        <td class="px-3">:</td>
                        <td>{{ $pemeriksaan_spesialis->leher ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Mata</td>
                        <td class="px-3">:</td>
                        <td>{{ $pemeriksaan_spesialis->mata ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Telinga Luar</td>
                        <td class="px-3">:</td>
                        <td>{{ $pemeriksaan_spesialis->telinga_luar ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Hidung Luar</td>
                        <td class="px-3">:</td>
                        <td>{{ $pemeriksaan_spesialis->hidung_luar ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Tenggorokan</td>
                        <td class="px-3">:</td>
                        <td>{{ $pemeriksaan_spesialis->tenggorokan ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Mulut</td>
                        <td class="px-3">:</td>
                        <td>{{ $pemeriksaan_spesialis->mulut ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Thorax</td>
                        <td class="px-3">:</td>
                        <td>{{ $pemeriksaan_spesialis->thorax ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Jantung</td>
                        <td class="px-3">:</td>
                        <td>{{ $pemeriksaan_spesialis->jantung ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Paru</td>
                        <td class="px-3">:</td>
                        <td>{{ $pemeriksaan_spesialis->paru ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Mamae</td>
                        <td class="px-3">:</td>
                        <td>{{ $pemeriksaan_spesialis->mamae ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Abdomen</td>
                        <td class="px-3">:</td>
                        <td>{{ $pemeriksaan_spesialis->abdomen ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Extremitas</td>
                        <td class="px-3">:</td>
                        <td>{{ $pemeriksaan_spesialis->extremitas ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Kulit</td>
                        <td class="px-3">:</td>
                        <td>{{ $pemeriksaan_spesialis->kulit ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Lain - Lain</td>
                        <td class="px-3">:</td>
                        <td>{{ $pemeriksaan_spesialis->lain_lain ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Diagnosa</td>
                        <td class="px-3">:</td>
                        <td>{{ $pemeriksaan_spesialis->diagnosa ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Rekomendasi</td>
                        <td class="px-3">:</td>
                        <td>{{ $pemeriksaan_spesialis->rekomendasi ?? '' }}</td>
                    </tr>
                </table>
                @if (!empty($pemeriksaan_spesialis->sinus_rhytm))
                    <h4 style="margin: 0; padding: 0;">Pemeriksaan Jantung</h4>
                    <table class="table table-borderless">
                        <tr>
                            <td class="fit-content">Dokter Pemeriksa</td>
                            <td class="fit-content px-3">:</td>
                            <td>{{ $pemeriksaan_spesialis->nama_dokter ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>EKG</td>
                            <td class="px-3">:</td>
                            <td>
                                Sinus Rhytm : {{ $pemeriksaan_spesialis->sinus_rhytm ?? '' }} <br>
                                HR : {{ $pemeriksaan_spesialis->hr ?? '' }} <br>
                                Kelainan : {{ $pemeriksaan_spesialis->kelainan_ekg ?? '' }} <br>
                                Kesimpulan : {{ $pemeriksaan_spesialis->kesimpulan_ekg ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <td>Threadmill</td>
                            <td class="px-3">:</td>
                            <td>
                                Deskripsi : {{ $pemeriksaan_spesialis->threadmill ?? '' }} <br>
                                Case : {{ $pemeriksaan_spesialis->status_threadmill ?? '' }} <br>
                                Kesimpulan : {{ $pemeriksaan_spesialis->kesimpulan_threadmill ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <td>Echocardiography</td>
                            <td class="px-3">:</td>
                            <td>{{ $pemeriksaan_spesialis->echocardiography ?? '' }}</td>
                        </tr>
                    </table>
                @endif
                @if (!empty($pemeriksaan_spesialis->status_neurologis))
                    <h4 style="margin: 0; padding: 0;">Pemeriksaan Neurology</h4>
                    <table class="table table-borderless">
                        <tr>
                            <td class="fit-content">Dokter Pemeriksa</td>
                            <td class="fit-content px-3">:</td>
                            <td>{{ $pemeriksaan_spesialis->nama_dokter ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Status Neurology</td>
                            <td class="px-3">:</td>
                            <td>{{ $pemeriksaan_spesialis->status_neurologis ?? '' }}</td>
                        </tr>
                    </table>
                @endif
                <table class="table table-borderless">
                    <tr>
                        <td colspan="3">
                            Dari pemeriksaan yang telah dilalui, kondisi kesehatan Anda saat ini.
                        </td>
                    </tr>
                    <tr>
                        <td class="fit-content fw-bold">INTERPRETASI</td>
                        <td class="fit-content px-3">:</td>
                        <td style="text-align: justify;">{{ $kesimpulan_mcu->interpretasi ?? '' }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">KESIMPULAN</td>
                        <td class="px-3">:</td>
                        <td style="text-align: justify;">
                            {{ $kesimpulan_mcu->kesimpulan ?? '' }}
                            @if (!empty($kesimpulan_mcu->keterangan) && $kesimpulan_mcu->keterangan != '-')
                                <br>
                                {{ $kesimpulan_mcu->keterangan }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-bold">REKOMENDASI</td>
                        <td class="px-3">:</td>
                        <td style="text-align: justify;">{{ $kesimpulan_mcu->rekomendasi ?? '' }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-borderless text-center">
                    <tr>
                        <td>
                            <br><br>
                            Koordinator General Check Up
                            <br>
                            <img height="100" src="{{ public_path('assets/img/ttd/284.png') }}">
                            <br>
                            ( dr. Rima Melati, Sp. AK, Sp. OK )
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        @if (count($list_pemesanan_laboratorium_hasil) > 0)
            <div class="pagebreak">&nbsp;</div>
            <div class="row mr-3">
                <div class="col-12">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <td align="right" style="white-space: nowrap;" width="20%"><img height="130px" src="{{ public_path('assets/img/logo/logo-rs.png') }}"></td>
                            <td>
                                <h3 style="margin: 15px; padding: 0;">Rumah Sakit Umum Pekerja</h3>
                                <h6 style="margin: 15px; padding: 0;">
                                    Jl. Tipar Cakung No. 46, RT. 2 / RW. 1
                                    <br>
                                    Sukapura, Kec. Cilincing, Kota Jakarta Utara
                                    <br>
                                    Daerah Khusus Ibukota Jakarta 14140
                                    <br>
                                    Telp. (021) 29484848
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <hr style="border-style: solid; border-width: 3px">
            <div class="row mr-3" style="font-size: 11px">
                <div class="col-12">
                    <table cellpadding="5" width="100%">
                        <tr>
                            <td width="1%">No. Medical Record</td>
                            <td width="1%">:</td>
                            <td class="font-weight-bold">{{ $identitas->no_mr }}</td>
                            <td></td>
                            <td width="1%">Nama Pasien</td>
                            <td width="1%">:</td>
                            <td class="font-weight-bold">{{ $identitas->nama_pasien }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>:</td>
                            <td class="font-weight-bold">{{ $identitas->tempat_lahir }},
                                {{ date('d/m/Y', strtotime($identitas->tanggal_lahir)) }}</td>
                            <td></td>
                            <td>Umur</td>
                            <td>:</td>
                            <td class="font-weight-bold">
                                {{ $identitas->tahun_lahir != 0 ? $identitas->tahun_lahir . ' Tahun' : '' }}
                                {{ $identitas->bulan_lahir != 0 ? $identitas->bulan_lahir . ' Bulan' : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td class="font-weight-bold">{{ $identitas->jenis_kelamin }}</td>
                            <td></td>
                            <td>Nasabah</td>
                            <td>:</td>
                            <td class="font-weight-bold">{{ $identitas->nama_nasabah }}</td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap">Tanggal Pemeriksaan</td>
                            <td>:</td>
                            <td class="font-weight-bold">{{ date('d/m/Y', strtotime($identitas->tanggal_masuk)) }}</td>
                            <td></td>
                            {{-- <td style="white-space: nowrap">Tanggal Hasil</td>
                            <td>:</td>
                            <td class="font-weight-bold">
                                {{ isset($list_pemesanan_laboratorium[0]->tgl_hasil) ? date('d/m/Y', strtotime($list_pemesanan_laboratorium[0]->tgl_hasil)) : '' }}
                            </td> --}}
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <h2>HASIL LABORATORIUM</h2>
                </div>
                <div class="col-12">
                    @foreach ($list_pemesanan_laboratorium as $pemesanan_laboratorium)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Pemeriksaan</th>
                                    <th class="fit-content">Flag Abnormal</th>
                                    <th class="fit-content">Hasil</th>
                                    <th class="fit-content">Unit</th>
                                    <th class="fit-content">Nilai Rujukan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_pemesanan_laboratorium_hasil as $key => $pemesanan_laboratorium_hasil)
                                    @if ($pemesanan_laboratorium->id == $pemesanan_laboratorium_hasil->pemesanan_laboratorium_id)
                                        @php
                                            if ($pemesanan_laboratorium_hasil->type == 'H') {
                                                $warna = 'text-primary';
                                                $batas = '';
                                            } elseif ($pemesanan_laboratorium_hasil->type == 'P') {
                                                $batas = '&nbsp;&nbsp;&nbsp;';
                                                $warna = 'text-success';
                                            } else {
                                                $batas = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                                $warna = '';
                                            }
                                            if (!empty($pemesanan_laboratorium_hasil->flag)) {
                                                if ($pemesanan_laboratorium_hasil->flag == 'H' || $pemesanan_laboratorium_hasil->flag == 'C') {
                                                    $abnormal_color = 'text-danger fw-bold';
                                                } else {
                                                    $abnormal_color = 'text-warning fw-bold';
                                                }
                                            } else {
                                                $abnormal_color = '';
                                            }
                                        @endphp
                                        <tr class="table-underline">
                                            <td class="{{ $warna }} fit-content">{!! $batas !!} {{ $pemesanan_laboratorium_hasil->nama_pemeriksaan }}</td>
                                            <td class="text-center">{{ $pemesanan_laboratorium_hasil->flag }}</td>
                                            <td class="text-center {{ $abnormal_color }}">{{ $pemesanan_laboratorium_hasil->hasil }}</td>
                                            <td class="text-center">{{ $pemesanan_laboratorium_hasil->unit }}</td>
                                            <td class="text-center">{{ $pemesanan_laboratorium_hasil->normal }}</td>
                                        </tr>
                                        @php
                                            unset($list_pemesanan_laboratorium_hasil[$key]);
                                        @endphp
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>
        @endif
        @if (count($list_pemesanan_radiologi) > 0)
            <div class="pagebreak">&nbsp;</div>
            <div class="row mr-3">
                <div class="col-12">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <td align="right" style="white-space: nowrap;" width="20%"><img height="130px" src="{{ public_path('assets/img/logo/logo-rs.png') }}"></td>
                            <td>
                                <h3 style="margin: 15px; padding: 0;">Rumah Sakit Umum Pekerja</h3>
                                <h6 style="margin: 15px; padding: 0;">
                                    Jl. Tipar Cakung No. 46, RT. 2 / RW. 1
                                    <br>
                                    Sukapura, Kec. Cilincing, Kota Jakarta Utara
                                    <br>
                                    Daerah Khusus Ibukota Jakarta 14140
                                    <br>
                                    Telp. (021) 29484848
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <hr style="border-style: solid; border-width: 3px">
            <div class="row mr-3" style="font-size: 11px">
                <div class="col-12">
                    <table cellpadding="5" width="100%">
                        <tr>
                            <td width="1%">No. Medical Record</td>
                            <td width="1%">:</td>
                            <td class="font-weight-bold">{{ $identitas->no_mr }}</td>
                            <td></td>
                            <td width="1%">Nama Pasien</td>
                            <td width="1%">:</td>
                            <td class="font-weight-bold">{{ $identitas->nama_pasien }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>:</td>
                            <td class="font-weight-bold">{{ $identitas->tempat_lahir }},
                                {{ date('d/m/Y', strtotime($identitas->tanggal_lahir)) }}</td>
                            <td></td>
                            <td>Umur</td>
                            <td>:</td>
                            <td class="font-weight-bold">
                                {{ $identitas->tahun_lahir != 0 ? $identitas->tahun_lahir . ' Tahun' : '' }}
                                {{ $identitas->bulan_lahir != 0 ? $identitas->bulan_lahir . ' Bulan' : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td class="font-weight-bold">{{ $identitas->jenis_kelamin }}</td>
                            <td></td>
                            <td>Nasabah</td>
                            <td>:</td>
                            <td class="font-weight-bold">{{ $identitas->nama_nasabah }}</td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap">Tanggal Pemeriksaan</td>
                            <td>:</td>
                            <td class="font-weight-bold">{{ date('d/m/Y', strtotime($identitas->tanggal_masuk)) }}</td>
                            <td></td>
                            {{-- <td style="white-space: nowrap">Tanggal Hasil</td>
                            <td>:</td>
                            <td class="font-weight-bold">
                                {{ isset($list_pemesanan_radiologi[0]->tgl_hasil) ? date('d/m/Y', strtotime($list_pemesanan_radiologi[0]->tgl_hasil)) : '' }}
                            </td> --}}
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <h2>HASIL RADIOLOGI</h2>
                </div>
                @foreach ($list_pemesanan_radiologi as $pemesanan_radiologi)
                    <p>Pemeriksaan : <strong>{{ $pemesanan_radiologi->nama_tindakan }}</strong></p>
                    <div class="col-12">
                        <p class="fw-bold">Deskripsi</p>
                        {!! nl2br(e($pemesanan_radiologi->deskripsi_dokter)) !!}
                    </div>
                    <div class="col-12">
                        <p class="fw-bold">Kesan</p>
                        {!! nl2br(e($pemesanan_radiologi->kesan)) !!}
                    </div>
                    <div class="col-12">
                        <p class="fw-bold">Saran</p>
                        {!! nl2br(e($pemesanan_radiologi->saran)) !!}
                    </div>
                    @foreach ($arr_pemesanan_radiologi_foto as $pemesanan_radiologi_foto)
                        <center>
                            @php
                                // $no_mr = Str::padLeft($pemesanan_radiologi->pasien_id, 8, '0');
                                // $nama_file = $pemesanan_radiologi_foto->nama_file;
                            @endphp
                            {{-- <img alt="File Foto" class="mt-3" src="{{ file_get_contents('http://192.168.0.23/lampiran/upload/hasil_rad/' . $no_mr . '/' . $nama_file) }}" width="80%"> --}}
                            @if($pemesanan_radiologi_foto)
                                <img alt="-" class="mt-3" src="{{ $pemesanan_radiologi_foto }}" width="80%">
                            @endif
                        </center>
                    @endforeach
                @endforeach
            </div>
        @endif
        @if (count($list_tindakan_medis) > 0)
            <div class="pagebreak">&nbsp;</div>
            <div class="row">
                <div class="col-12 text-center">
                    <h2>LAMPIRAN HASIL TINDAKAN MEDIS</h2>
                </div>
                <div class="col-12">
                    @foreach ($list_tindakan_medis as $tindakan_medis)
                        <p>Pemeriksaan : <strong>{{ $tindakan_medis->nama_tindakan }}</strong></p>
                        <p class="fw-bold">Hasil :</p>
                        {!! nl2br(e($tindakan_medis->hasil)) !!}
                        <br>
                        <p class="fw-bold">Kesimpulan :</p>
                        {!! nl2br(e($tindakan_medis->kesimpulan)) !!}
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</body>

</html>
