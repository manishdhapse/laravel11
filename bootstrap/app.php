<?php
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AuthChecker;
use App\Http\Middleware\AdminMiddleware;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->alias([
            'Member' => AuthChecker::class,
            'Admin' => AdminMiddleware::class,
        ]);
       // $middleware->appendToGroup('Auth',[AuthChecker::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
