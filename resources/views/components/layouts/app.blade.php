<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />

        <meta name="application-name" content="{{ config('app.name') . '-' . $title }}" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>{{ config('app.name') . ' - ' . $title }}</title>

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>

        @filamentStyles
        @vite('resources/css/app.css')
    </head>

    <body class="bg-gray-100">
        <a
            class="sr-only rounded bg-blue-500 px-4 py-2 text-white focus:not-sr-only focus:absolute focus:left-4 focus:top-4"
            href="#main"
        >
            Aller au contenu principal
        </a>

        <x-header />

        <main class="container mx-auto px-4 py-8" id="main" tabindex="-1">
            <h1 class="py-4 text-2xl font-bold">{{ $title }}</h1>
            {{ $slot }}
        </main>

        @livewire('notifications')

        @filamentScripts
        @vite('resources/js/app.js')
    </body>
</html>
