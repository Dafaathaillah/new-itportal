<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\HandleInertiaRequests;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'api' => [
                \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
                'throttle:api',
                \Illuminate\Routing\Middleware\SubstituteBindings::class,
            ],
            'type.ict_developer' => \App\Http\Middleware\IctDeveloperMiddleware::class,
            // 'type.ict_section_head' => \App\Http\Middleware\UserMiddleware::class,
            // 'type.ict_group_leader' => \App\Http\Middleware\UserMiddleware::class,
            // 'type.ict_admin' => \App\Http\Middleware\AdminMiddleware::class,
            // 'type.ict_technician' => \App\Http\Middleware\AdminMiddleware::class,
            // 'type.ict_guest' => \App\Http\Middleware\AdminMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'status' => 'false',
                    'message' => 'Route Not found',
                ], 404);
            }
        });
    })->create();
