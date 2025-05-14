<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kolker+Brush&family=Outfit:wght@100..900&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @fluxAppearance
    </head>
    <body>
        {{-- Background Pattern --}}
        <div class="fixed inset-0 -z-10">
            <div class="relative h-full w-full
                [&>div]:absolute [&>div]:h-full [&>div]:w-full
                [&>div]:bg-[radial-gradient(#e1e6ff_1px,transparent_1px)]
                [&>div]:[background-size:8px_8px]
                [&>div]:[mask-image:radial-gradient(ellipse_50%_50%_at_50%_50%,#000_70%,transparent_100%)]
                [&>div]:dark:bg-[radial-gradient(#052f4a_1px,transparent_1px)]">
                <div></div>
            </div>
        </div>

        {{-- Home --}}
        @include('livewire.home.header')

        {{-- Experience --}}
        <div class="pb-6">
            <div class="max-w-7xl mx-auto mb-14 px-3 xl:px-0">
                <div class="text-5xl text-slate-800 font-bold text-center
                    dark:text-white/20
                    lg:text-start lg:text-6xl">
                        Experiencia
                </div>
            </div>

            @livewire('home.experience')
        </div>


        {{-- Projects --}}
        <div class="py-6">
            <div class="max-w-7xl mx-auto mb-14 px-3 xl:px-0">
                <div class="text-5xl text-slate-800 font-bold text-center
                    dark:text-white/20
                    lg:text-start lg:text-6xl">
                        Proyectos
                </div>
            </div>

            @livewire('home.projects')
        </div>

        {{-- Contact --}}
        <div class="py-6">
            <div class="max-w-7xl mx-auto mb-14 px-3 xl:px-0">
                <div class="text-5xl text-slate-800 font-bold text-center
                    dark:text-white/20
                    lg:text-start lg:text-6xl">
                        Contacto
                </div>
            </div>

            <div class="px-3 xl:px-0">
                <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-8">
                </div>
            </div>
        </div>
    </body>
</html>
