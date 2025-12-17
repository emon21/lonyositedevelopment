<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
    // // এখানে আপনার SetLocale middleware web group-এ যোগ করুন
    // $middleware->web(append: [
    //     \App\Http\Middleware\SetLocale::class,
    // ]);

    // // যদি অন্য কোনো middleware যোগ করতে চান, এখানে করতে পারেন
    // // উদাহরণ: $middleware->append(YourGlobalMiddleware::class);

    # more code here....
    // SetLocale কে web group-এ শেষের দিকে append করুন (session start হওয়ার পরে)
    $middleware->web(append: [
        \App\Http\Middleware\SetLocale::class,
    ]);

    // যদি priority দিয়ে order control করতে চান (optional, কিন্তু safe)
    $middleware->priority([
        \Illuminate\Session\Middleware\StartSession::class, // session আগে
        \App\Http\Middleware\SetLocale::class,               // তারপর locale
    ]);
})
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
