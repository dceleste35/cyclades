<div>
    <div class="rounded-lg bg-white shadow">
        <div class="flex items-center justify-between border-b p-4">
            <input
                class="rounded-lg border px-4 py-2"
                type="search"
                wire:model.debounce.300ms="search"
                placeholder="Rechercher..."
            />
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">N° candidat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">N° inscription</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Prénom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Naissance</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Nationalité</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Qualification</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">État</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($paginated as $candidat)
                        <tr class="hover:bg-gray-50">
                            <td class="whitespace-nowrap px-6 py-4">{{ $candidat->numero_candidat }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $candidat->numero_inscription }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $candidat->nom_famille }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $candidat->prenoms }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $candidat->date_naissance }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $candidat->nationalite }}</td>
                            <td class="px-6 py-4">{{ $candidat->qualification_presentee }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $candidat->etat }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-4 py-3">
                <div class="pagination-links">
                    {{ $paginated->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
