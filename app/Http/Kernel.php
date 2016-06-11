<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
	/**
	 * The application's global HTTP middleware stack.
	 *
	 * These middleware are run during every request to your application.
	 *
	 * @var array
	 */
	protected $middleware = [
		\Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
	];

	/**
	 * The application's route middleware groups.
	 *
	 * @var array
	 */
	protected $middlewareGroups = [
		'web' => [
			\Illuminate\Session\Middleware\StartSession::class,
			\App\Http\Middleware\Login::class,
			\App\Http\Middleware\Change::class,
		],

		'free' => [
			\Illuminate\Session\Middleware\StartSession::class,
			\App\Http\Middleware\Change::class,
		],

		'change' => [
			\Illuminate\Session\Middleware\StartSession::class,
			\App\Http\Middleware\ReChange::class,
		],

		'logout' => [
			\Illuminate\Session\Middleware\StartSession::class,
		],		

		'api' => [
			'throttle:60,1',
		],
	];

	/**
	 * The application's route middleware.
	 *
	 * These middleware may be assigned to groups or used individually.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'auth' => \App\Http\Middleware\Authenticate::class,
		'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
		'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
		'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
	];
}
