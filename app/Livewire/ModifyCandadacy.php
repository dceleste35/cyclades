<?php

namespace App\Livewire;

use App\Models\Candidate;
use Livewire\Attributes\Title;
use Livewire\Component;

class ModifyCandadacy extends Component
{
    public $filtreTexte = '';

    public $criteresSelectionnes = [];

    public $criteresDisponibles = [
        'numero_candidat' => 'N° Candidat',
        'numero_inscription' => 'N° Inscription',
        'nom_famille' => 'Nom de famille',
        'nom_usage' => 'Nom d usage',
        'prenom' => 'Prénoms',
        'date_naissance' => 'Date de naissance',
        'sexe' => 'Sexe',
        'ine' => 'INE',
        'nationalite' => 'Nationalité',
        'pays_naissance' => 'Pays de Naissance',
        'allophone' => 'Candidat allophone',
        'qualification_presentee' => 'Qualification présentée',
        'examen' => 'Examen',
        'enseignement_specialite' => 'Enseignement de spécialité',
        'section_langue' => 'Section de langue',
        'langue_section' => 'Langue de la section',
        'parcours_bfi' => 'Parcours BFI',
        'parcours_bfi_premiere' => 'Parcours BFI en 1ère',
        'section_langue_premiere' => 'Section de langue en 1ère',
        'dnl_selo' => 'DNL de la SELO',
        'etat' => 'Etat',
        'candidature_validee' => 'Candidature validée',
        'discipline_eloignee' => 'Discipline éloignée',
        'categorie_candidat' => 'Catégorie du candidat',
        'categorie_candidat_premiere' => 'Catégorie du candidat en 1ère',
    ];

    public $valeursCriteres = [];

    public function ajouterCritere($key, $critere)
    {
        if (in_array($critere, $this->criteresSelectionnes)) {

            unset($this->criteresSelectionnes[$key]);

            return $this->dispatch('criteresUpdated');
        }

        $this->criteresSelectionnes[$key] = $critere;
        $this->valeursCriteres[$critere] = [
            'key' => $key,
            'comparateur' => 'egal',
            'valeur' => '',
        ];
        $this->dispatch('criteresUpdated');
    }

    public function supprimerCritere($critere)
    {
        $this->criteresSelectionnes = array_values(array_filter(
            $this->criteresSelectionnes,
            fn ($c) => $c !== $critere
        ));

        unset($this->valeursCriteres[$critere]);
        $this->dispatch('criteresUpdated');
    }

    public function modifierComparateur($critere, $valeur)
    {
        $this->valeursCriteres[$critere]['comparateur'] = $valeur;
    }

    public function modifierValeur($critere, $valeur)
    {
        $this->valeursCriteres[$critere]['valeur'] = $valeur;
    }

    public function rechercher()
    {

        $candidats = Candidate::where(function ($query) {
            foreach ($this->valeursCriteres as $critere) {
                $query->orWhere($critere['key'], 'like', '%'.$critere['valeur'].'%');
            }
        })
            ->get();

        session(['candidats' => $candidats]);

        $this->redirectRoute('inscription.manage.candidature');
    }

    #[Title('Consulter / Modifier des candidatures')]
    public function render()
    {
        return view('livewire.modify-candadacy');
    }
}
