<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Stevebauman\Location\Facades\Location;

class DetectRegion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $region = session()->get('region');

        if (!$region) {
            // Use IP geolocation or other detection methods
            if ($request->ip() == '127.0.0.1') {
				$user_ip = '106.219.159.62';
			} else {
				$user_ip = $request->ip();
			}

            $currentUserInfo =  Location::get($user_ip);
            $region = strtolower($currentUserInfo->countryCode);
            $request->session()->put('region', $region);
        }
        return $next($request);
    }
}
