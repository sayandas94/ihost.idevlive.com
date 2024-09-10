<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
            // $region = Geoip::getLocation($request->ip());
            $region = 'us';
            $request->session()->put('region', $region);
        }
        return $next($request);
    }
}
