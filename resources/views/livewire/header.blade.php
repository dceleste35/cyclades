<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div class="min-h-full">
    <nav class="border-b border-gray-200 bg-white" aria-label="Navigation principale">
        <div class="mx-auto max-w-7xl">
            <div class="flex h-16 justify-between">
                <div class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8" x-data>
                    <div
                        class="relative inline-block h-full border-b-2 text-left"
                        x-data="{ open: false }"
                        x-on:mouseover="open = true"
                        x-on:mouseleave="open = false"
                        x-bind:class="
                            {{ request()->routeIs('home') }}
                                ? 'border-indigo-500 text-gray-900'
                                : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'
                        "
                    >
                        <div class="flex h-full">
                            <a
                                class="inline-flex items-center px-1 pt-1 text-sm font-medium"
                                href="/"
                                aria-current="page"
                            >
                                Accueil
                                <x-heroicon-o-chevron-down
                                    class="ml-1 h-5 w-5 transition hover:scale-110"
                                    aria-label="Ouvrir le sous-menu Accueil"
                                    x-bind:class="{'rotate-180': open}"
                                />
                            </a>
                        </div>

                        <div
                            class="absolute left-0 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu"
                            aria-orientation="vertical"
                            aria-labelledby="menu-button"
                            x-show="open"
                            x-transition:enter="transition duration-100 ease-out"
                            x-transition:enter-start="scale-95 transform opacity-0"
                            x-transition:enter-end="scale-100 transform opacity-100"
                            x-transition:leave="transition duration-75 ease-in"
                            x-transition:leave-start="scale-100 transform opacity-100"
                            x-transition:leave-end="scale-95 transform opacity-0"
                            tabindex="-1"
                        >
                            <div class="py-1" role="none">
                                <a
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                    href="#"
                                    role="menuitem"
                                >
                                    Option 1
                                </a>
                                <a
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                    href="#"
                                    role="menuitem"
                                >
                                    Option 2
                                </a>
                                <a
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                    href="#"
                                    role="menuitem"
                                >
                                    Option 3
                                </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="relative inline-block h-full border-b-2 border-transparent text-left text-gray-500 hover:border-gray-300 hover:text-gray-700"
                        x-data="{ open: false }"
                        x-on:mouseover="open = true"
                        x-on:mouseleave="open = false"
                    >
                        <div class="flex h-full">
                            <a
                                class="inline-flex items-center px-1 pt-1 text-sm font-medium"
                                href="#"
                                aria-current="page"
                            >
                                Réglementation
                                <x-heroicon-o-chevron-down
                                    class="ml-1 h-5 w-5 transition hover:scale-110"
                                    aria-label="Ouvrir le sous-menu Réglementation"
                                    x-bind:class="{'rotate-180': open}"
                                />
                            </a>
                        </div>
                    </div>
                    <div
                        class="relative inline-block h-full border-b-2 text-left"
                        x-data="{ open: false }"
                        x-on:keyup.enter="open = !open"
                        x-on:keyup.escape="open = false"
                        x-on:mouseover="open = true"
                        x-on:mouseleave="open = false"
                        x-bind:class="
                            {{ request()->routeIs('inscription.*') }}
                                ? 'border-indigo-500 text-gray-900'
                                : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'
                        "
                    >
                        <div class="flex h-full">
                            <a
                                class="inline-flex items-center px-1 pt-1 text-sm font-medium"
                                href="#"
                                aria-current="page"
                            >
                                Inscription
                                <x-heroicon-o-chevron-down
                                    class="ml-1 h-5 w-5 transition hover:scale-110"
                                    aria-label="Ouvrir le sous-menu Inscription"
                                    x-bind:class="{'rotate-180': open}"
                                />
                            </a>
                        </div>
                        <div
                            class="absolute left-0 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu"
                            aria-orientation="vertical"
                            aria-labelledby="menu-button"
                            x-show="open"
                            x-transition:enter="transition duration-100 ease-out"
                            x-transition:enter-start="scale-95 transform opacity-0"
                            x-transition:enter-end="scale-100 transform opacity-100"
                            x-transition:leave="transition duration-75 ease-in"
                            x-transition:leave-start="scale-100 transform opacity-100"
                            x-transition:leave-end="scale-95 transform opacity-0"
                            tabindex="-1"
                        >
                            <div class="py-1" role="none">
                                <a
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                    href="#"
                                    role="menuitem"
                                >
                                    Gérer les sevices d'inscription
                                </a>
                                <a
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                    href="{{ route('inscription.manage') }}"
                                    role="menuitem"
                                >
                                    Gérer les inscriptions
                                </a>
                                <a
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                    href="#"
                                    role="menuitem"
                                >
                                    Gérer les mesures handicap
                                </a>
                                <a
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                    href="#"
                                    role="menuitem"
                                >
                                    Editer les listes de candidatures
                                </a>
                                <a
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                    href="#"
                                    role="menuitem"
                                >
                                    Editer liste des candidats allophones
                                </a>
                                <a
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                    href="#"
                                    role="menuitem"
                                >
                                    Editer des confirmations d'inscription
                                </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="relative inline-block h-full border-b-2 border-transparent text-left text-gray-500 hover:border-gray-300 hover:text-gray-700"
                        x-data="{ open: false }"
                        x-on:mouseover="open = true"
                        x-on:mouseleave="open = false"
                    >
                        <div class="flex h-full">
                            <a
                                class="inline-flex items-center px-1 pt-1 text-sm font-medium"
                                href="#"
                                aria-current="page"
                            >
                                Orga-affection
                                <x-heroicon-o-chevron-down
                                    class="ml-1 h-5 w-5 transition hover:scale-110"
                                    aria-label="Ouvrir le sous-menu Orga-affection"
                                    x-bind:class="{'rotate-180': open}"
                                />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <button
                        class="relative rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        type="button"
                        aria-label="Voir les notifications"
                    >
                        <span class="sr-only">Voir les notifications</span>
                        <svg
                            class="h-6 w-6"
                            aria-hidden="true"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"
                            />
                        </svg>
                    </button>

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <button
                                class="relative flex max-w-xs items-center rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                id="user-menu-button"
                                type="button"
                                aria-expanded="false"
                                aria-haspopup="true"
                                aria-label="Ouvrir le menu utilisateur"
                            >
                                <span class="sr-only">Ouvrir le menu utilisateur</span>
                                <img
                                    class="h-8 w-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="Photo de profil utilisateur"
                                />
                            </button>
                        </div>

                        <!--
                Dropdown menu, show/hide based on menu state.

                Entering: "transition ease-out duration-200"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->
                        <div
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu"
                            aria-orientation="vertical"
                            aria-labelledby="user-menu-button"
                            tabindex="-1"
                        >
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a
                                class="block px-4 py-2 text-sm text-gray-700"
                                id="user-menu-item-0"
                                href="#"
                                role="menuitem"
                                tabindex="-1"
                            >
                                Your Profile
                            </a>
                            <a
                                class="block px-4 py-2 text-sm text-gray-700"
                                id="user-menu-item-1"
                                href="#"
                                role="menuitem"
                                tabindex="-1"
                            >
                                Settings
                            </a>
                            <a
                                class="block px-4 py-2 text-sm text-gray-700"
                                id="user-menu-item-2"
                                href="#"
                                role="menuitem"
                                tabindex="-1"
                            >
                                Sign out
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
