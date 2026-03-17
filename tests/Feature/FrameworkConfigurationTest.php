<?php

declare(strict_types=1);

use Illuminate\Support\Str;

it('uses laravel 13 compatible framework defaults', function (): void {
    expect(config('cache.serializable_classes'))->toBeFalse();

    $cachePrefix = (string) config('cache.prefix');
    $expectedCachePrefix = Str::slug((string) config('app.name', 'laravel')) . '-cache-';

    expect($cachePrefix)->toStartWith($expectedCachePrefix);
    expect(config('database.redis.options.prefix'))->toBe(Str::slug((string) config('app.name', 'laravel')) . '-database-');
    expect(config('session.cookie'))->toBe(Str::snake((string) config('app.name', 'laravel')) . '_session');
});
