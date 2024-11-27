<div
    class="mx-auto mt-4 max-w-7xl"
    x-data="{
        activeTab: 'identification',
        init() {
            this.$watch('activeTab', (value) => {
                this.$nextTick(() => {
                    const button = this.$refs[`${value}Tab`]
                    button.focus()
                })
            })
        },
        handleKeyNav(event, currentTab) {
            const tabs = ['identification', 'informations', 'qualification']
            const currentIndex = tabs.indexOf(currentTab)

            if (event.key === 'ArrowRight' || event.key === 'ArrowLeft') {
                event.preventDefault()
                const direction = event.key === 'ArrowRight' ? 1 : -1
                const newIndex =
                    (currentIndex + direction + tabs.length) % tabs.length
                this.activeTab = tabs[newIndex]
            }
        },
    }"
>
    <section
        class="mb-6 overflow-hidden rounded-xl border border-gray-100 bg-white shadow-sm"
        aria-label="Informations principales du candidat"
    >
        <div class="bg-gradient-to-r from-purple-500 to-purple-600 px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex gap-4 text-white" role="list">
                    <div role="listitem">
                        <span class="text-sm text-purple-200" id="candidate-number-label">N° candidat</span>
                        <p class="font-semibold" aria-labelledby="candidate-number-label">
                            {{ $candidate->numero_candidat }}
                        </p>
                    </div>
                    <div role="listitem">
                        <span class="text-sm text-purple-200" id="inscription-number-label">N° inscription</span>
                        <p class="font-semibold" aria-labelledby="inscription-number-label">
                            {{ $candidate->numero_inscription }}
                        </p>
                    </div>
                    <div role="listitem">
                        <span class="text-sm text-purple-200" id="candidate-name-label">Candidat</span>
                        <p class="font-semibold" aria-labelledby="candidate-name-label">
                            {{ $candidate->nom_famille }} {{ $candidate->prenoms }}
                        </p>
                    </div>
                </div>
                <div
                    class="flex items-center gap-2 rounded-lg bg-white px-4 py-2 text-purple-600"
                    role="status"
                    aria-label="État du candidat"
                >
                    <div
                        class="{{ $candidate->etat === 'Inscrit' ? 'bg-green-500' : 'bg-yellow-500' }} h-2 w-2 rounded-full"
                        aria-hidden="true"
                    ></div>
                    <span class="font-medium">{{ $candidate->etat }}</span>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-100 bg-gray-50 px-6 py-3">
            <div class="flex items-center gap-4 text-sm text-gray-500" role="list">
                <div class="flex items-center gap-1" role="listitem">
                    <svg class="h-4 w-4" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                        />
                    </svg>
                    <span>Créée le {{ $candidate->created_at->format('d/m/Y à H:i') }}</span>
                </div>
                <div class="flex items-center gap-1" role="listitem">
                    <svg class="h-4 w-4" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                        />
                    </svg>
                    <span>Modifiée le {{ $candidate->updated_at->format('d/m/Y à H:i') }}</span>
                </div>
            </div>
        </div>
    </section>

    <nav
        class="mb-6 overflow-hidden rounded-xl border border-gray-100 bg-white shadow-sm"
        aria-label="Sections du profil candidat"
    >
        <div class="flex divide-x divide-gray-100" role="tablist" aria-label="Navigation des sections">
            <template x-for="(tab, index) in ['identification', 'informations', 'qualification']" :key="tab">
                <button
                    class="flex-1 px-6 py-4 text-sm font-medium"
                    role="tab"
                    :id="`${tab}-tab`"
                    :ref="`${tab}Tab`"
                    :aria-selected="activeTab === tab"
                    :aria-controls="`${tab}-panel`"
                    :class="activeTab === tab ? 'border-b-2 border-purple-500 text-purple-100 bg-purple-500' : 'text-gray-500 hover:text-gray-700'"
                    @click="activeTab = tab"
                    x-text="tab.charAt(0).toUpperCase() + tab.slice(1)"
                ></button>
            </template>
        </div>
    </nav>

    <div class="mt-6">
        <section
            class="space-y-6"
            id="identification-panel"
            role="tabpanel"
            aria-labelledby="identification-tab"
            x-show="activeTab === 'identification'"
            tabindex="0"
        >
            <div class="rounded-lg bg-white p-6 shadow">
                <h3 class="mb-4 text-lg font-medium" id="identity-heading">Identité</h3>
                <dl class="grid grid-cols-2 gap-4">
                    <div>
                        <dt class="text-sm text-gray-500">INE</dt>
                        <dd class="font-medium">{{ $candidate->ine }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500">Sexe</dt>
                        <dd class="font-medium">{{ $candidate->sexe }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500">Nom de famille</dt>
                        <dd class="font-medium">{{ $candidate->nom_famille }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500">Nom d'usage</dt>
                        <dd class="font-medium">{{ $candidate->nom_usage ?: 'Non renseigné' }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500">Prénoms</dt>
                        <dd class="font-medium">{{ $candidate->prenoms }}</dd>
                    </div>
                </dl>
            </div>

            <div class="rounded-lg bg-white p-6 shadow">
                <h3 class="mb-4 text-lg font-medium">Naissance</h3>
                <dl class="grid grid-cols-2 gap-4">
                    <div>
                        <dt class="text-sm text-gray-500">Date de naissance</dt>
                        <dd class="font-medium">{{ $candidate->date_naissance->format('d/m/Y') }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500">Pays de naissance</dt>
                        <dd class="font-medium">{{ $candidate->pays_naissance }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500">Nationalité</dt>
                        <dd class="font-medium">{{ $candidate->nationalite }}</dd>
                    </div>
                </dl>
            </div>
        </section>

        <section
            class="space-y-6"
            id="informations-panel"
            role="tabpanel"
            aria-labelledby="informations-tab"
            x-show="activeTab === 'informations'"
            tabindex="0"
        >
            <div class="rounded-lg bg-white p-6 shadow">
                <h3 class="mb-4 text-lg font-medium">Établissement</h3>
                <dl class="grid grid-cols-2 gap-4">
                    <div>
                        <dt class="text-sm text-gray-500">Académie d'origine</dt>
                        <dd class="font-medium">{{ $academie['nom'] }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500">Établissement</dt>
                        <dd class="font-medium">{{ $etablissement['code'] }} - {{ $etablissement['nom'] }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500">Statut</dt>
                        <dd class="font-medium">{{ $etablissement['statut'] }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500">Nature</dt>
                        <dd class="font-medium">{{ $etablissement['nature'] }}</dd>
                    </div>
                </dl>
            </div>

            <div class="rounded-lg bg-white p-6 shadow">
                <h3 class="mb-4 text-lg font-medium">Situation du candidat</h3>
                <dl class="grid grid-cols-2 gap-4">
                    <div>
                        <dt class="text-sm text-gray-500">Catégorie</dt>
                        <dd class="font-medium">{{ $candidate->categorie_candidat }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500">État</dt>
                        <dd class="font-medium">{{ $candidate->etat }}</dd>
                    </div>
                </dl>
            </div>
        </section>

        <section
            class="space-y-6"
            id="qualification-panel"
            role="tabpanel"
            aria-labelledby="qualification-tab"
            x-show="activeTab === 'qualification'"
            tabindex="0"
        >
            <div class="rounded-lg bg-white p-6 shadow">
                <h3 class="mb-4 text-lg font-medium">Enseignements de spécialité</h3>
                <dl class="space-y-4">
                    @foreach ($specialites as $index => $specialite)
                        <div>
                            <dt class="text-sm text-gray-500">Spécialité {{ $index + 1 }}</dt>
                            <dd class="font-medium">{{ $specialite }}</dd>
                        </div>
                    @endforeach
                </dl>
            </div>

            <div class="rounded-lg bg-white p-6 shadow">
                <h3 class="mb-4 text-lg font-medium">Qualification</h3>
                <dl class="grid grid-cols-2 gap-4">
                    <div>
                        <dt class="text-sm text-gray-500">Qualification présentée</dt>
                        <dd class="font-medium">{{ $candidate->qualification_presentee }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-500">Section de langue</dt>
                        <dd class="font-medium">{{ $candidate->section_langue ?: 'Pas de section de langue' }}</dd>
                    </div>
                </dl>
            </div>
        </section>
    </div>
</div>
