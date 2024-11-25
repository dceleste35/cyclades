@if ($paginator->hasPages())
    <nav class="flex items-center justify-between px-4 py-3 sm:px-6" role="navigation" aria-label="Pagination">
        <div class="flex flex-1 justify-between sm:hidden">
            @if ($paginator->onFirstPage())
                <span
                    class="relative inline-flex cursor-default items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-400"
                >
                    Précédent
                </span>
            @else
                <button
                    class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    wire:click="previousPage"
                    wire:loading.attr="disabled"
                >
                    Précédent
                </button>
            @endif

            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700">
                Page {{ $paginator->currentPage() }} sur {{ $paginator->lastPage() }}
            </span>

            @if ($paginator->hasMorePages())
                <button
                    class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    wire:click="nextPage"
                    wire:loading.attr="disabled"
                >
                    Suivant
                </button>
            @else
                <span
                    class="relative inline-flex cursor-default items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-400"
                >
                    Suivant
                </span>
            @endif
        </div>

        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    Affichage de
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    à
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    sur
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    résultats
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex rounded-md shadow-sm">
                    <button
                        class="{{ $paginator->onFirstPage() ? 'cursor-default text-gray-400' : 'hover:bg-gray-50 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500' }} relative inline-flex items-center rounded-l-md border border-gray-300 bg-white px-3 py-2 text-sm font-medium"
                        aria-label="Page précédente"
                        wire:click="previousPage"
                        wire:loading.attr="disabled"
                        @if($paginator->onFirstPage()) disabled aria-disabled="true" @endif
                    >
                        <span class="sr-only">Page précédente</span>
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>

                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <span
                                class="relative -ml-px inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700"
                                aria-disabled="true"
                            >
                                {{ $element }}
                            </span>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                <button
                                    class="{{
                                        $page == $paginator->currentPage()
                                            ? 'z-10 border-blue-500 bg-blue-50 text-blue-600'
                                            : 'bg-white text-gray-700 hover:bg-gray-50 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500'
                                    }} relative -ml-px inline-flex items-center border border-gray-300 px-4 py-2 text-sm font-medium"
                                    aria-label="Page {{ $page }}"
                                    aria-current="{{ $page == $paginator->currentPage() ? 'page' : 'false' }}"
                                    wire:click="gotoPage({{ $page }})"
                                    wire:loading.attr="disabled"
                                >
                                    {{ $page }}
                                </button>
                            @endforeach
                        @endif
                    @endforeach

                    <button
                        class="{{ ! $paginator->hasMorePages() ? 'cursor-default text-gray-400' : 'hover:bg-gray-50 focus:z-10 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500' }} relative -ml-px inline-flex items-center rounded-r-md border border-gray-300 bg-white px-3 py-2 text-sm font-medium"
                        aria-label="Page suivante"
                        wire:click="nextPage"
                        wire:loading.attr="disabled"
                        @if(!$paginator->hasMorePages()) disabled aria-disabled="true" @endif
                    >
                        <span class="sr-only">Page suivante</span>
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </span>
            </div>
        </div>

        <div class="absolute inset-0 flex items-center justify-center bg-gray-100 bg-opacity-50" wire:loading>
            <div
                class="inline-flex cursor-not-allowed items-center px-4 py-2 font-semibold leading-6 text-blue-600 transition duration-150 ease-in-out"
            >
                <svg
                    class="-ml-1 mr-3 h-5 w-5 animate-spin text-blue-600"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                >
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path
                        class="opacity-75"
                        fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                    ></path>
                </svg>
                Chargement...
            </div>
        </div>
    </nav>
@endif
