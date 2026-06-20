<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PragmaRX\Google2FA\Google2FA;

class TwoFactorController extends Controller
{
    /**
     * Show the 2FA verification page.
     */
    public function index()
    {
        $user = auth()->user();

        if (session('2fa_passed')) {
            return redirect()->route('admin.dashboard');
        }

        if (empty($user->google2fa_secret)) {
            return redirect()->route('2fa.setup');
        }

        return view('auth.2fa-verify');
    }

    /**
     * Verify the 2FA login code.
     */
    public function verify(Request $request)
    {
        $request->validate([
            'code' => ['required', 'string', 'size:6'],
        ]);

        $user = auth()->user();
        $google2fa = new Google2FA();

        // Allow a clock tolerance of 1 time slice (30 seconds)
        $valid = $google2fa->verifyKey($user->google2fa_secret, $request->code, 1);

        if ($valid) {
            session(['2fa_passed' => true]);
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'code' => 'Kode autentikasi salah atau sudah kedaluwarsa. Silakan coba lagi.',
        ]);
    }

    /**
     * Show the 2FA setup/registration page.
     */
    public function setup()
    {
        $user = auth()->user();

        if (session('2fa_passed')) {
            return redirect()->route('admin.dashboard');
        }

        if (!empty($user->google2fa_secret)) {
            return redirect()->route('2fa.index');
        }

        $google2fa = new Google2FA();

        // Retrieve existing temporary secret from session or generate a new one
        $secret = session('google2fa_temp_secret');
        if (!$secret) {
            $secret = $google2fa->generateSecretKey();
            session(['google2fa_temp_secret' => $secret]);
        }

        // Format secret for easier manual entry reading (splits into chunks of 4)
        $formattedSecret = implode(' ', str_split($secret, 4));

        // Generate the OTP Auth URL for the QR code
        $qrCodeUrl = $google2fa->getQRCodeUrl(
            'RSUP KBN Portal',
            $user->username,
            $secret
        );

        return view('auth.2fa-setup', [
            'secret' => $formattedSecret,
            'qrCodeUrl' => $qrCodeUrl,
        ]);
    }

    /**
     * Verify the setup code and enable 2FA for the user.
     */
    public function register(Request $request)
    {
        $request->validate([
            'code' => ['required', 'string', 'size:6'],
        ]);

        $secret = session('google2fa_temp_secret');
        if (!$secret) {
            return redirect()->route('2fa.setup')->withErrors([
                'code' => 'Sesi setup telah kedaluwarsa. Silakan coba lagi.',
            ]);
        }

        $google2fa = new Google2FA();
        $valid = $google2fa->verifyKey($secret, $request->code, 1);

        if ($valid) {
            $user = auth()->user();
            
            // Save secret key to the database
            $user->google2fa_secret = $secret;
            $user->save();

            // Clear temporary session data
            session()->forget('google2fa_temp_secret');

            // Mark session as 2FA passed
            session(['2fa_passed' => true]);

            return redirect()->route('admin.dashboard')->with('success', 'Google Authenticator berhasil diaktifkan!');
        }

        return back()->withErrors([
            'code' => 'Kode verifikasi salah. Silakan coba lagi.',
        ]);
    }
}
