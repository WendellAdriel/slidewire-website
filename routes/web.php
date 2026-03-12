<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

$homeRoute = Route::slidewire('/', 'home');
$homeRoute->action['as'] = 'home';

Route::view('/docs', 'docs')->name('docs');
