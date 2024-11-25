<div>
    {{-- Composant principal --}}
    <div class="rounded-xl border border-gray-100 bg-white shadow-sm" role="region" aria-label="Liste des candidatures">
        {{-- En-tête avec barre de recherche --}}
        <div class="border-b border-gray-100 p-4">
            <div class="relative">
                <input
                    class="w-full rounded-lg border border-gray-200 py-2 pl-10 pr-4 transition-colors focus:border-blue-500 focus:ring-2 focus:ring-blue-500 md:max-w-xs"
                    type="search"
                    aria-label="Rechercher dans la liste des candidatures"
                    wire:model.debounce.300ms="search"
                    placeholder="Rechercher un candidat..."
                />
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                        />
                    </svg>
                </span>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200" role="grid">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left">
                            <div
                                class="flex items-center gap-x-2 text-xs font-medium uppercase tracking-wider text-gray-500"
                            >
                                N° candidat
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left">
                            <div
                                class="flex items-center gap-x-2 text-xs font-medium uppercase tracking-wider text-gray-500"
                            >
                                N° inscription
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left">
                            <div
                                class="flex items-center gap-x-2 text-xs font-medium uppercase tracking-wider text-gray-500"
                            >
                                Nom
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left">
                            <div
                                class="flex items-center gap-x-2 text-xs font-medium uppercase tracking-wider text-gray-500"
                            >
                                Prénom
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left">
                            <div
                                class="flex items-center gap-x-2 text-xs font-medium uppercase tracking-wider text-gray-500"
                            >
                                Naissance
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left">
                            <div
                                class="flex items-center gap-x-2 text-xs font-medium uppercase tracking-wider text-gray-500"
                            >
                                Nationalité
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left">
                            <div
                                class="flex items-center gap-x-2 text-xs font-medium uppercase tracking-wider text-gray-500"
                            >
                                Qualification
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left">
                            <div
                                class="flex items-center gap-x-2 text-xs font-medium uppercase tracking-wider text-gray-500"
                            >
                                État
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left">
                            <div
                                class="flex items-center gap-x-2 text-xs font-medium uppercase tracking-wider text-gray-500"
                            >
                                Actions
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="cursor-pointer divide-y divide-gray-200 bg-white">
                    @foreach ($paginated as $candidat)
                        <tr
                            class="transition-colors focus-within:bg-gray-50 hover:bg-gray-50"
                            wire:key="candidat-{{ $candidat->id }}"
                            wire:click="showCandidate({{ $candidat->id }})"
                        >
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900">
                                {{ $candidat->numero_candidat }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900">
                                {{ $candidat->numero_inscription }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                                {{ $candidat->nom_famille }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900">
                                {{ $candidat->prenoms }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900">
                                {{ $candidat->date_naissance }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-900">
                                {{ $candidat->nationalite }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                {{ $candidat->qualification_presentee }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <span
                                    class="@switch($candidat->etat)
                                        @case('En attente')
                                            bg-yellow-100 text-yellow-800
                                            @break
                                        @case('Validé')
                                            bg-green-100 text-green-800
                                            @break
                                        @case('Refusé')
                                            bg-red-100 text-red-800
                                            @break
                                        @default
                                            bg-gray-100 text-gray-800
                                    @endswitch inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium"
                                >
                                    {{ $candidat->etat }}
                                </span>
                            </td>
                            <td class="flex justify-center px-6 py-4 text-right">
                                <button
                                    class="inline-flex items-center justify-center rounded-lg p-2 text-gray-500 hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                                    aria-label="Voir les détails de {{ $candidat->nom_famille }} {{ $candidat->prenoms }}"
                                    wire:click="showCandidate({{ $candidat->id }})"
                                >
                                    <x-heroicon-o-eye class="h-5 w-5" />
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="border-t border-gray-200 px-4 py-3">
            {{ $paginated->links('components.custom-pagination') }}
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const table = document.querySelector('table[role="grid"]')

                table.addEventListener('keydown', function (e) {
                    const currentCell = document.activeElement
                    const currentRow = currentCell.closest('tr')

                    switch (e.key) {
                        case 'ArrowRight':
                            e.preventDefault()
                            const nextCell = currentCell.nextElementSibling
                            if (nextCell) nextCell.focus()
                            break
                        case 'ArrowLeft':
                            e.preventDefault()
                            const prevCell = currentCell.previousElementSibling
                            if (prevCell) prevCell.focus()
                            break
                        case 'ArrowDown':
                            e.preventDefault()
                            const nextRow = currentRow.nextElementSibling
                            if (nextRow) {
                                const cellIndex = Array.from(currentRow.cells).indexOf(currentCell)
                                nextRow.cells[cellIndex].focus()
                            }
                            break
                        case 'ArrowUp':
                            e.preventDefault()
                            const prevRow = currentRow.previousElementSibling
                            if (prevRow) {
                                const cellIndex = Array.from(currentRow.cells).indexOf(currentCell)
                                prevRow.cells[cellIndex].focus()
                            }
                            break
                    }
                })
            })
        </script>
    @endpush
</div>
