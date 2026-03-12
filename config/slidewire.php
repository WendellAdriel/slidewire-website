<?php

declare(strict_types=1);

use Phiki\Theme\Theme;
use WendellAdriel\SlideWire\DTOs\FontConfig;
use WendellAdriel\SlideWire\DTOs\ThemeConfig;
use WendellAdriel\SlideWire\DTOs\ThemeFont;
use WendellAdriel\SlideWire\Enums\FontSource;

return [
    'themes' => [
        'default' => new ThemeConfig(
            background: 'bg-gradient-to-br from-slate-900 via-blue-950 to-slate-950 text-slate-50',
            highlightTheme: Theme::CatppuccinMocha,
            title: new ThemeFont(font: 'Sora', color: 'text-slate-50', size: 'text-4xl'),
            text: new ThemeFont(font: 'Sora', color: 'text-slate-200', size: 'text-lg'),
        ),
        'black' => new ThemeConfig(
            background: 'bg-slate-900 text-slate-200',
            highlightTheme: Theme::CatppuccinMocha,
            title: new ThemeFont(font: 'Sora', color: 'text-slate-200', size: 'text-4xl'),
            text: new ThemeFont(font: 'Sora', color: 'text-slate-300', size: 'text-lg'),
        ),
        'white' => new ThemeConfig(
            background: 'bg-white text-zinc-800',
            highlightTheme: Theme::CatppuccinLatte,
            title: new ThemeFont(font: 'Sora', color: 'text-zinc-800', size: 'text-4xl'),
            text: new ThemeFont(font: 'Sora', color: 'text-zinc-600', size: 'text-lg'),
        ),
        'aurora' => new ThemeConfig(
            background: 'bg-gradient-to-br from-emerald-950 via-cyan-900 to-slate-950 text-emerald-50',
            highlightTheme: Theme::CatppuccinMocha,
            title: new ThemeFont(font: 'Sora', color: 'text-emerald-50', size: 'text-4xl'),
            text: new ThemeFont(font: 'Sora', color: 'text-cyan-100', size: 'text-lg'),
        ),
        'sunset' => new ThemeConfig(
            background: 'bg-gradient-to-br from-rose-950 via-orange-900 to-amber-700 text-orange-50',
            highlightTheme: Theme::CatppuccinMocha,
            title: new ThemeFont(font: 'Sora', color: 'text-orange-50', size: 'text-4xl'),
            text: new ThemeFont(font: 'Sora', color: 'text-amber-100', size: 'text-lg'),
        ),
        'neon' => new ThemeConfig(
            background: 'bg-gradient-to-br from-fuchsia-950 via-violet-900 to-cyan-900 text-fuchsia-50',
            highlightTheme: Theme::CatppuccinMocha,
            title: new ThemeFont(font: 'Sora', color: 'text-fuchsia-50', size: 'text-4xl'),
            text: new ThemeFont(font: 'Sora', color: 'text-cyan-100', size: 'text-lg'),
        ),
        'solarized' => new ThemeConfig(
            background: 'bg-yellow-50 text-slate-600',
            highlightTheme: Theme::CatppuccinLatte,
            title: new ThemeFont(font: 'Sora', color: 'text-slate-700', size: 'text-4xl'),
            text: new ThemeFont(font: 'Sora', color: 'text-slate-600', size: 'text-lg'),
        ),
    ],

    'fonts' => [
        'Sora' => new FontConfig(source: FontSource::Google, weights: [400, 500, 600, 700]),
        'JetBrainsMono' => new FontConfig(source: FontSource::Google, weights: [400, 700]),
    ],
];
