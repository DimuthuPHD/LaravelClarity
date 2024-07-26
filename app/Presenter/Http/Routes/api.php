<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    includeRouteFiles(__DIR__ . '/v1');
});

