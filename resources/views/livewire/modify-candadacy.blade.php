<div class="rounded-lg bg-white p-6 shadow-sm">
    <div class="grid grid-cols-1 gap-6 md:grid-cols-4">
        <div class="rounded-lg bg-gray-50 p-4 md:col-span-1">
            <div class="mb-4" role="search">
                <label class="mb-1 block text-sm font-medium text-gray-700" for="filtre">Filtrer les critères</label>
                <input
                    class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                    id="filtre"
                    type="text"
                    aria-label="Filtrer les critères de recherche"
                    wire:model.live="filtreTexte"
                    placeholder="Filtrer les critères..."
                />
            </div>

            <div
                class="max-h-[calc(100vh-300px)] space-y-1 overflow-y-auto p-2"
                role="listbox"
                aria-label="Liste des critères disponibles"
            >
                @foreach ($this->criteresDisponibles as $key => $critere)
                    <button
                        class="flex w-full items-center rounded-md p-2 text-left text-sm hover:bg-purple-50"
                        role="option"
                        wire:click="ajouterCritere('{{ $key }}', '{{ $critere }}')"
                        tabindex="0"
                        x-data="{ selected: false }"
                        x-on:click="selected = !selected"
                        x-bind:class="{ 'bg-purple-500 text-purple-100': selected }"
                    >
                        <span class="mr-2">+</span>
                        {{ $critere }}
                    </button>
                @endforeach
            </div>
        </div>

        <div class="min-h-96 space-y-4 md:col-span-3">
            @foreach ($this->criteresSelectionnes as $key => $critere)
                <fieldset
                    class="rounded-lg bg-gray-50 p-4"
                    role="group"
                    aria-labelledby="critere-{{ $key }}"
                    wire:key="{{ $key }}"
                >
                    <div class="mb-2 flex items-center justify-between">
                        <legend class="text-sm font-medium text-gray-700" id="critere-{{ $key }}">
                            {{ $critere }}
                        </legend>
                        <button
                            class="rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500"
                            type="button"
                            aria-label="Supprimer le critère {{ $critere }}"
                            wire:click="supprimerCritere('{{ $critere }}')"
                            tabindex="0"
                        >
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <select
                            class="block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                            aria-label="Type de comparaison pour {{ $critere }}"
                            wire:model.live="valeursCriteres.{{ $critere }}.comparateur"
                        >
                            <option value="egal">Égal</option>
                            <option value="contient">Contient</option>
                            <option value="commence">Commence par</option>
                        </select>
                        <div class="flex gap-2">
                            <input
                                class="block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                type="text"
                                aria-label="Valeur pour {{ $critere }}"
                                wire:model.live="valeursCriteres.{{ $critere }}.valeur"
                            />
                        </div>
                    </div>
                </fieldset>
            @endforeach

            <div
                class="flex flex-wrap justify-end gap-4 pt-4"
                x-data="rechercheAvancee()"
                x-show="showButtons"
                x-cloak
                x-transition:enter="transition duration-300 ease-out"
                x-transition:enter-start="-translate-y-2 transform opacity-0"
                x-transition:enter-end="translate-y-0 transform opacity-100"
                x-transition:leave="transition duration-300 ease-in"
                x-transition:leave-start="translate-y-0 transform opacity-100"
                x-transition:leave-end="-translate-y-2 transform opacity-0"
            >
                <button
                    class="rounded-md bg-purple-600 px-4 py-2 text-white hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2"
                    type="button"
                    wire:click="rechercher"
                >
                    <span class="flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                            />
                        </svg>
                        Rechercher
                    </span>
                </button>

                <button
                    class="rounded-md bg-purple-600 px-4 py-2 text-white hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2"
                    type="button"
                    x-on:click="window.location.reload()"
                >
                    <span class="flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                            />
                        </svg>
                        Rafraîchir
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>

@script
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('rechercheAvancee', () => ({
                showButtons: false,

                init() {
                    this.showButtons = @entangle('criteresSelectionnes').length > 0

                    $wire.on('criteresUpdated', () => {
                        this.showButtons = true
                    })

                    $wire.on('deleteCriteres', () => {
                        this.showButtons = $wire.criteresSelectionnes.length > 0
                    })
                }
            }))
        })
    </script>
@endscript
