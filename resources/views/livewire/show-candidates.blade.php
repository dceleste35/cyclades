<div>
    <div class="rounded-lg bg-white shadow" role="region" aria-label="Liste des candidatures">
        <div class="flex items-center justify-between border-b p-4">
            <h2 class="text-lg font-semibold" id="tableTitle">Liste des candidatures</h2>
            <input
                class="rounded-lg border px-4 py-2"
                type="search"
                aria-label="Rechercher dans la liste des candidatures"
                wire:model.debounce.300ms="search"
                placeholder="Rechercher..."
            />
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200" role="grid" aria-labelledby="tableTitle" tabindex="0">
                <thead class="bg-gray-50">
                    <tr role="row">
                        <th
                            class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500"
                            role="columnheader"
                            scope="col"
                            tabindex="-1"
                        >
                            N° candidat
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500"
                            role="columnheader"
                            scope="col"
                            tabindex="-1"
                        >
                            N° inscription
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500"
                            role="columnheader"
                            scope="col"
                            tabindex="-1"
                        >
                            Nom
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500"
                            role="columnheader"
                            scope="col"
                            tabindex="-1"
                        >
                            Prénom
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500"
                            role="columnheader"
                            scope="col"
                            tabindex="-1"
                        >
                            Naissance
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500"
                            role="columnheader"
                            scope="col"
                            tabindex="-1"
                        >
                            Nationalité
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500"
                            role="columnheader"
                            scope="col"
                            tabindex="-1"
                        >
                            Qualification
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500"
                            role="columnheader"
                            scope="col"
                            tabindex="-1"
                        >
                            État
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500"
                            role="columnheader"
                            scope="col"
                            tabindex="-1"
                        >
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($paginated as $candidat)
                        <tr class="hover:bg-gray-50" role="row" tabindex="-1">
                            <td class="whitespace-nowrap px-6 py-4" role="gridcell" tabindex="-1">
                                {{ $candidat->numero_candidat }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4" role="gridcell" tabindex="-1">
                                {{ $candidat->numero_inscription }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4" role="gridcell" tabindex="-1">
                                {{ $candidat->nom_famille }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4" role="gridcell" tabindex="-1">
                                {{ $candidat->prenoms }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4" role="gridcell" tabindex="-1">
                                {{ $candidat->date_naissance }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4" role="gridcell" tabindex="-1">
                                {{ $candidat->nationalite }}
                            </td>
                            <td class="px-6 py-4" role="gridcell" tabindex="-1">
                                {{ $candidat->qualification_presentee }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4" role="gridcell" tabindex="-1">
                                {{ $candidat->etat }}
                            </td>
                            <td class="flex gap-2 px-6 py-4" role="gridcell">
                                <button
                                    class="text-blue-600 hover:text-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    aria-label="Voir les détails de {{ $candidat->nom_famille }} {{ $candidat->prenoms }}"
                                    tabindex="0"
                                >
                                    <span class="sr-only">Voir</span>
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                        />
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                        />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <nav class="px-4 py-3" role="navigation" aria-label="Pagination">
            <div class="pagination-links">
                {{ $paginated->links() }}
            </div>
        </nav>
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
