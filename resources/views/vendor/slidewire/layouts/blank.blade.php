<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'SlideWire' }}</title>
    <meta name="description" content="Create beautiful Livewire-powered presentations with SlideWire.">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title ?? 'SlideWire' }}">
    <meta property="og:description" content="Create beautiful Livewire-powered presentations with SlideWire.">
    <meta property="og:url" content="{{ request()->fullUrl() }}">
    <meta property="og:image" content="{{ url('/cover.png') }}">
    <meta property="og:image:alt" content="SlideWire cover image">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'SlideWire' }}">
    <meta name="twitter:description" content="Create beautiful Livewire-powered presentations with SlideWire.">
    <meta name="twitter:image" content="{{ url('/cover.png') }}">
    <script defer src="https://api.pirsch.io/pa.js" id="pianjs" data-code="hOO5Fej7RTPRYHpp7NYLPc2zdvBaqYEv"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
        html, body {
            margin: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background: #080d19;
        }
    </style>
</head>
<body>
    {{ $slot }}

    @livewireScripts
</body>
</html>
