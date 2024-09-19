<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Cookie;

class AuthorisedUser
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
	 */
	public function handle(Request $request, Closure $next): Response
	{
		if (!$request->session()->get('token')) {
			$request->session()->put('previous_url', url()->previous());
			return redirect(url('sign-in'));
		}

		// if (!Cookie::get('auth_token')) {
		// 	$request->session()->put('previous_url', url()->previous());
		// 	return redirect(url('sign-in'));
		// }

		// $curl = curl_init(env('API_URL') . 'accounts/profile');

		// curl_setopt_array($curl, [
		// 	CURLOPT_RETURNTRANSFER => true,
		// 	CURLOPT_HTTPHEADER => [
		// 		'Content-Type: application/json',
		// 		'Authorization: Bearer ' . Cookie::get('auth_token')
		// 	]
		// ]);

		// $response = curl_exec($curl);

		// curl_close($curl);

		// $response = json_decode($response);

		// if (!$response) {
		// 	$request->session()->put('previous_url', url()->previous());
		// 	return redirect(url('sign-in'));
		// }

		return $next($request);
	}
}
