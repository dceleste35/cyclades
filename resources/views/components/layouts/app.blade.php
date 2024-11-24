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

        <header class="bg-white shadow" role="banner">
            <div class="container mx-auto px-4">
                <nav aria-label="Menu principal" x-data>
                    <ul class="m-0 flex list-none space-x-6 p-0 py-4">
                        <li>
                            <a
                                class="no-underline"
                                href="/"
                                aria-current="page"
                                x-bind:class="
                                    {{ request()->routeIs('home') }}
                                        ? 'text-blue-800 font-bold'
                                        : 'text-gray-500 hover:text-gray-700'
                                "
                            >
                                Accueil
                            </a>
                        </li>
                        <li><a class="text-gray-600 no-underline hover:text-gray-800" href="#">Administration</a></li>
                        <li><a class="text-gray-600 no-underline hover:text-gray-800" href="#">Réglementation</a></li>
                        <li class="group relative">
                            <a
                                class="no-underline"
                                href="#"
                                aria-haspopup="true"
                                aria-expanded="false"
                                x-bind:class="
                                    {{ request()->routeIs('inscription.*') }}
                                        ? 'text-blue-800 font-bold'
                                        : 'text-gray-500 hover:text-gray-700'
                                "
                            >
                                Inscription
                            </a>
                            <ul
                                class="absolute left-0 z-10 mt-1 hidden w-64 rounded-md bg-white shadow-lg group-focus-within:block group-hover:block"
                            >
                                <li>
                                    <a
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:bg-gray-100"
                                        href="#"
                                    >
                                        Gérer les services d'inscription
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:bg-gray-100"
                                        href="{{ route('inscription.manage') }}"
                                    >
                                        Gérer les inscriptions
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:bg-gray-100"
                                        href="#"
                                    >
                                        Gérer les mesures handicap
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:bg-gray-100"
                                        href="#"
                                    >
                                        Editer des listes de candidatures
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:bg-gray-100"
                                        href="#"
                                    >
                                        Editer liste des candidats allophones
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="text-gray-600 no-underline hover:text-gray-800" href="#">Orga-Affectation</a></li>
                        <li><a class="text-gray-600 no-underline hover:text-gray-800" href="#">Déroulement</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <main class="container mx-auto px-4 py-8" id="main" tabindex="-1">
            <h1 class="py-4 text-2xl font-bold">{{ $title }}</h1>
            {{ $slot }}
        </main>

        @livewire('notifications')

        @filamentScripts
        @vite('resources/js/app.js')
    </body>
</html>
