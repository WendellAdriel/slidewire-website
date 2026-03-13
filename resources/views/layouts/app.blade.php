<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? $metaTitle ?? 'SlideWire' }}</title>
        <meta name="description" content="{{ $metaDescription ?? 'SlideWire documentation and presentation examples.' }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $metaTitle ?? $title ?? 'SlideWire' }}">
        <meta property="og:description" content="{{ $metaDescription ?? 'SlideWire documentation and presentation examples.' }}">
        <meta property="og:url" content="{{ request()->fullUrl() }}">
        <meta property="og:image" content="{{ $metaImage ?? url('/cover.png') }}">
        <meta property="og:image:alt" content="SlideWire cover image">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $metaTitle ?? $title ?? 'SlideWire' }}">
        <meta name="twitter:description" content="{{ $metaDescription ?? 'SlideWire documentation and presentation examples.' }}">
        <meta name="twitter:image" content="{{ $metaImage ?? url('/cover.png') }}">

        @fluxAppearance

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        @livewireStyles
    </head>
    <body class="docs-body antialiased">
        {{ $slot }}

        @fluxScripts
        @livewireScripts
    </body>
</html>
