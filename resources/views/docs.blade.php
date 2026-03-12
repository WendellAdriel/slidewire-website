<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Docs - {{ config('app.name') }}</title>

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="min-h-screen bg-slate-950 text-slate-100">
        <main class="mx-auto flex min-h-screen max-w-4xl flex-col justify-center gap-8 px-6 py-16 sm:px-10">
            <div class="inline-flex w-fit items-center rounded-full border border-cyan-400/30 bg-cyan-400/10 px-4 py-2 text-sm font-medium uppercase tracking-[0.25em] text-cyan-200">
                SlideWire docs
            </div>

            <div class="space-y-4">
                <h1 class="text-4xl font-semibold tracking-tight text-white sm:text-5xl">Documentation is coming soon.</h1>
                <p class="max-w-2xl text-lg leading-8 text-slate-300">
                    This placeholder route is ready for the full SlideWire documentation experience. For now, head back to the homepage deck or browse the package source on GitHub.
                </p>
            </div>

            <div class="flex flex-wrap gap-4">
                <a href="/" class="inline-flex items-center justify-center rounded-full border border-white/15 bg-white/5 px-5 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                    Return home
                </a>
                <a href="https://github.com/WendellAdriel/slidewire" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center rounded-full border border-fuchsia-400/35 bg-fuchsia-400/10 px-5 py-3 text-sm font-semibold text-fuchsia-100 transition hover:bg-fuchsia-400/20">
                    View GitHub
                </a>
            </div>
        </main>
    </body>
</html>
