<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\DetectRegion;
use App\Http\Middleware\AuthorisedUser;

use App\Http\Controllers\ViewController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\HostingController;


// Route::get('/', function () {
//     return view('welcome');
// });

/**
 * 1. Route for accounts
 *  1.1 Login
 *  1.2 Register
 *  1.3 Recover Password
 *  1.4 Billing
 *  1.5 Active Subscription
 *  1.6 Fetch Address
 *  1.7 Update Address
 *  1.8 Update Email
 *  1.9 Update Password
 *  1.10 Update Support Pin
 */

/**
 * 2. Route for Views
 *  2.1 Home
 *  2.2 Domain
 *      2.2.1 Domain Name Search
 *      2.2.2 Transfer Domain
 *      2.2.3 Domain Name Extension
 *      2.2.4 Save With Bundles
 *      2.2.5 Find a Domain Owner
 *      2.2.6 Investing in Domains
 *  2.3 Hosting
 *      2.3.1 Web Hosting
 *      2.3.2 Wordpress Hosting
 *      2.3.3 WooCommerce Hosting
 *      2.3.4 Virtual Private Server
 *      2.3.5 Hosted Virtual Desktop
 *      2.3.6 All Hosting Options
 *  2.4 Emails
 *  2.5 Help Center
 *      2.5.1 Customer Support
 *      2.5.2 Tutorials
 *      2.5.3 Knowledge Base
 *      2.5.4 How To Videos
 *      2.5.5 Report Abuse
 *  2.6 Cart
 *  2.7 Login
 *  2.8 Register
 *  2.9 Recover Password
 *  2.10
 */

Route::view('script', 'script');
Route::post('add-tld', [DomainController::class, 'add_tld']);

Route::get('change-region/{region}', function ($region) {
	session()->put('region', $region);

	if ($region == 'us') {
		return redirect('/');
	}
	
	return redirect($region);
});

Route::group(['middleware' => DetectRegion::class], function () {
	Route::get('/', function () {
		switch (session()->get('region')) {
			case 'in':
				return redirect('in');
				break;

			case 'us':
				return view('us/index');
				break;
			
			default:
				return view('us/index');
				break;
		}
	});

	Route::get('domains', function () {
		switch (session()->get('region')) {
			case 'in':
				return redirect('in/domains');
				break;

			case 'ca':
				return redirect('ca/domains');
				break;

			case 'us':
				return view('us.domains');
				break;
			
			default:
				return view('us.domains');
				break;
		}
	});

	Route::get('domain-transfer', function () {
		switch (session()->get('region')) {
			case 'in':
				return redirect('in/domain-transfer');
				break;

			case 'ca':
				return redirect('ca/domain-transfer');
				break;

			case 'us':
				return view('us.domain-transfer');
				break;
			
			default:
				return view('us.domain-transfer');
				break;
		}
	});

	Route::get('domain-name-extensions', function () {
		switch (session()->get('region')) {
			case 'in':
				return redirect('in/domain-name-extensions');
				break;

			case 'ca':
				return redirect('ca/domain-name-extensions');
				break;

			case 'us':
				return view('us.domain-name-extensions');
				break;
			
			default:
				return view('us.domain-name-extensions');
				break;
		}
	});

	Route::get('whois', function () {
		switch (session()->get('region')) {
			case 'in':
				return redirect('in/whois');
				break;

			case 'ca':
				return redirect('ca/whois');
				break;

			case 'us':
				return view('us.whois');
				break;
			
			default:
				return view('us.whois');
				break;
		}
	});

	Route::get('hosting', function () {
		switch (session()->get('region')) {
			case 'in':
				return redirect('in/hosting');
				break;

			case 'ca':
				return redirect('ca/hosting');
				break;

			case 'us':
				return view('us.hosting');
				break;
			
			default:
				return view('us.hosting');
				break;
		}
	});

	Route::get('web-hosting', function () {
		switch (session()->get('region')) {
			case 'in':
				return redirect('in/web-hosting');
				break;

			case 'ca':
				return redirect('ca/web-hosting');
				break;

			case 'us':
				return view('us.web-hosting');
				break;
			
			default:
				return view('us.web-hosting');
				break;
		}
	});

	Route::get('wordpress-hosting', function () {
		switch (session()->get('region')) {
			case 'in':
				return redirect('in/wordpress-hosting');
				break;

			case 'ca':
				return redirect('ca/wordpress-hosting');
				break;

			case 'us':
				return view('us.wordpress');
				break;
			
			default:
				return view('us.wordpress');
				break;
		}
	});

	Route::get('virtual-private-server', function () {
		switch (session()->get('region')) {
			case 'in':
				return redirect('in/vps');
				break;

			case 'ca':
				return redirect('ca/vps');
				break;

			case 'us':
				return view('us.vps');
				break;
			
			default:
				return view('us.vps');
				break;
		}
	});

	Route::get('emails', function () {
		switch (session()->get('region')) {
			case 'in':
				return redirect('in/emails');
				break;

			case 'ca':
				return redirect('ca/emails');
				break;

			case 'us':
				return view('us.emails');
				break;
			
			default:
				return view('us.emails');
				break;
		}
	});

	Route::get('business-email', function () {
		switch (session()->get('region')) {
			case 'in':
				return redirect('in/business-email');
				break;

			case 'ca':
				return redirect('ca/business-email');
				break;

			case 'us':
				return view('us.business-email');
				break;
			
			default:
				return view('us.business-email');
				break;
		}
	});
});

Route::group(['prefix' => 'us'], function () {
	Route::view('/', 'us.index');
	Route::view('hosting', 'us.hosting');
});

Route::group(['prefix' => 'in', 'middleware' => DetectRegion::class], function () {
	Route::view('/', 'in.index');
	Route::view('domains', 'in.domains');
	Route::view('domain-transfer', 'in.domain-transfer');
	Route::view('domain-name-extensions', 'in.domain-name-extensions');
	Route::view('whois', 'in.whois');
	Route::view('hosting', 'in.hosting');
	Route::view('hosting', 'in.hosting');
	Route::view('web-hosting', 'in.web-hosting');
	Route::view('wordpress-hosting', 'in.wordpress');
	Route::get('ecommerce-hosting', function () {
		return redirect('coming-soon');
	});
	Route::get('vps', function () {
		return redirect('coming-soon');
	});
	Route::get('hosted-virtual-desktop', function () {
		return redirect('coming-soon');
	});
	Route::view('emails', 'in.emails');
	Route::view('business-email', 'in.business-email');
});

Route::view('help-center', 'help');
Route::view('customer-support', 'support');
Route::view('report-abuse', 'abuse');

Route::view('refund-policy', 'refund');
Route::view('terms-of-service', 'terms');
Route::view('privacy-policy', 'privacy');

Route::view('cart', 'cart');
Route::post('cart/add-item', [CartController::class, 'add_item']);
Route::post('cart/add', [CartController::class, 'insert']);
Route::get('cart/remove/{id?}', [CartController::class, 'remove']);
Route::post('cart/update-cart', [CartController::class, 'update']);

Route::group(['middleware' => DetectRegion::class], function () {
	Route::view('sign-up', 'register');
});
Route::post('sign-up', [AccountsController::class, 'register']);
Route::view('sign-in', 'login');
Route::post('sign-in', [AccountsController::class, 'login']);
Route::view('reset-password', 'reset-password');

Route::get('domain/get-tld-info', [DomainController::class, 'tld_info']);
Route::post('domain/search', [DomainController::class, 'search']);

Route::get('hosting/choose-plan', [HostingController::class, 'choose_plan']);

Route::group(['middleware' => AuthorisedUser::class], function () {
	Route::view('checkout', 'checkout');

	Route::group(['prefix' => 'checkout'], function () {
		// Route::view('billing-address', 'billing');
		Route::get('billing-address', [ViewController::class, 'billing_address']);
		Route::get('payment', [ViewController::class, 'payment_method']);

		Route::get('create-invoice', [CartController::class, 'create_invoice']);
		Route::get('deliver-products', [CartController::class, 'deliver_products']);
	});

	Route::group(['prefix' => 'user'], function () {
		Route::view('dashboard', 'user.dashboard');
		// Route::get('dashboard', [ViewController::class, 'dashboard']);
		Route::get('domains', [ViewController::class, 'domains']);
		# ROUTES FOR DNS AND MANAGING THEM
		// Route::get('manage-domain/{domain_name}', [DomainController::class, 'dns']);
		Route::get('manage-domain/{domain_name}', [ViewController::class, 'manage_domain']);
		Route::get('hosting', [ViewController::class, 'hosting']);
		Route::get('emails', [ViewController::class, 'emails']);
		Route::get('account', [ViewController::class, 'account']);
		Route::get('billing', [ViewController::class, 'billing']);

		Route::get('logout', [AccountsController::class, 'logout']);
	});

	Route::group(['prefix' => 'accounts'], function () {
		Route::get('profile', [AccountsController::class, 'profile_data']);
		Route::get('active-subscriptions', [AccountsController::class, 'active_subscriptions']);
		Route::get('fetch-address', [AccountsController::class, 'fetch_address']);
		Route::get('invoices', [AccountsController::class, 'invoices']);
		Route::get('update-autorenew', [AccountsController::class, 'update_autorenew']);
		
		Route::post('update-address', [AccountsController::class, 'update_address']);
		Route::post('update-password', [AccountsController::class, 'update_password']);
		Route::post('update-pin', [AccountsController::class, 'update_pin']);
		Route::post('update-address-checkout', [AccountsController::class, 'update_address_checkout']);
	});

	Route::group(['prefix' => 'domain'], function () {
		Route::get('status', [DomainController::class, 'domain_status']);
		Route::get('details', [DomainController::class, 'domain_details']);

		Route::get('fetch-dns', [DomainController::class, 'fetch_dns']);
		Route::post('add-dns', [DomainController::class, 'add_dns']);
		Route::post('edit-dns', [DomainController::class, 'edit_dns']);
		Route::get('delete-dns', [DomainController::class, 'delete_dns']);

		Route::post('modify-ns', [DomainController::class, 'modify_ns']);

		Route::get('change-privacy', [DomainController::class, 'change_privacy']);
		Route::get('domain-lock', [DomainController::class, 'domain_lock']);
		Route::get('theft-protection', [DomainController::class, 'theft_protection']);
	});

	Route::group(['prefix' => 'hosting'], function () {
		Route::post('setup', [HostingController::class, 'setup']);
	});
});

Route::group(['middleware' => AuthorisedUser::class], function () {
    // Route::get('checkout', [UserController::class, 'checkout']);
});

Route::view('error', 'error');
Route::view('coming-soon', 'coming-soon');

Route::get('hosted-virtual-desktop', function () {
	return redirect('coming-soon');
});
Route::get('ecommerce-hosting', function () {
	return redirect('coming-soon');
});
Route::get('tutorials', function () {
	return redirect('coming-soon');
});
Route::get('how-to-videos', function () {
	return redirect('coming-soon');
});
Route::get('knowledgebase', function () {
	return redirect('coming-soon');
});