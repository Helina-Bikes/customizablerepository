<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\http\Middleware\AdminMiddleware;
//use App\Http\Middleware\AdminMiddleware;
use Spatie\Permission\Middlewares\RoleMiddleware;
use Spatie\Permission\Middlewares\PermissionMiddleware;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
         $middleware->alias([
             'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
             'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
             'role_or_permission' => \Spatie\Permission\Middlewares\RoleOrPermissionMiddleware::class,
             'check.systemowner' => \App\Http\Middleware\CheckSystemOwnerRole::class,
         ]);
    }) 
    
    ->withExceptions(function (Exceptions $exceptions) {
        
    })->create();
