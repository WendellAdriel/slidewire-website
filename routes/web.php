<?php

declare(strict_types=1);

use App\Livewire\DocsPage;
use Illuminate\Support\Facades\Route;

$homeRoute = Route::slidewire('/', 'home');
$homeRoute->action['as'] = 'home';

$showcaseRoute = Route::slidewire('/showcase', 'showcase');
$showcaseRoute->action['as'] = 'showcase';

Route::livewire('/docs', DocsPage::class)->name('docs');
Route::livewire('/docs/{page}', DocsPage::class)->where('page', '[A-Za-z0-9-]+')->name('docs.page');
