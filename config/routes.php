<?php

declare(strict_types=1);

use Forge\Demo\Action\AboutAction;
use Forge\Demo\Action\ContactAction;
use Forge\Demo\Action\HomeAction;
use Yiisoft\Http\Method;
use Yiisoft\Router\Route;

return [
    Route::get('/')->action([HomeAction::class, 'run'])->name('home'),
    Route::get('/about')->action([AboutAction::class, 'run'])->name('about'),
    Route::methods([Method::GET, Method::POST], '/contact')->action([ContactAction::class, 'run'])->name('contact'),
];
