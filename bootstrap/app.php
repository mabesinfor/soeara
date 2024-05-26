<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Laravel\Sanctum\Http\Middleware\CheckAbilities;
use Laravel\Sanctum\Http\Middleware\CheckForAnyAbility;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->statefulApi();
        $middleware->alias([
            'abilities' => CheckAbilities::class,
            'ability' => CheckForAnyAbility::class,
            'role' => \App\Http\Middleware\CheckRole::class,
            'check.profile.owner' => \App\Http\Middleware\CheckProfileOwner::class,
            'can' => \Illuminate\Auth\Middleware\Authorize::class,
            'ajax' => \App\Http\Middleware\AjaxOnly::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
    })->create();