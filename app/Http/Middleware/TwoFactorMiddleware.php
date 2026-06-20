<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TwoFactorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            $user = auth()->user();

            // Exclude these routes from 2FA redirection to prevent loop
            $excludedRoutes = [
                '2fa.index',
                '2fa.verify',
                '2fa.setup',
                '2fa.register',
                'logout',
            ];

            if ($request->routeIs($excludedRoutes)) {
                return $next($request);
            }

            if (!session('2fa_passed')) {
                if (empty($user->google2fa_secret)) {
                    return redirect()->route('2fa.setup');
                }
                return redirect()->route('2fa.index');
            }
        }

        return $next($request);
    }
}
