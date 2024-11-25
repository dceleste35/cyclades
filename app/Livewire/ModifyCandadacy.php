<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class ModifyCandadacy extends Component
{
    public $filtreTexte = '';

    public $criteresSelectionnes = [];

    public $criteresDisponibles = [
        'N° Candidat',
        'N° Inscription',
        'Nom de famille',
        'Nom d\'usage',
        'Prénoms',
    ];

    public $valeursCriteres = [];

    public function ajouterCritere($critere)
    {
        if (! in_array($critere, $this->criteresSelectionnes)) {
            $this->criteresSelectionnes[] = $critere;
            $this->valeursCriteres[$critere] = [
                'comparateur' => 'egal',
                'valeur' => '',
            ];
            $this->dispatch('criteresUpdated');
        }
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
        dd($this->valeursCriteres);
    }

    #[Title('Consulter / Modifier des candidatures')]
    public function render()
    {
        return view('livewire.modify-candadacy');
    }
}
