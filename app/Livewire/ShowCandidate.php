<?php

namespace App\Livewire;

use App\Models\Candidate;
use Livewire\Attributes\Title;
use Livewire\Component;

class ShowCandidate extends Component
{
    public Candidate $candidate;

    public string $activeTab = 'identification';

    public function mount(Candidate $candidate)
    {
        $this->candidate = $candidate;
    }

    protected function getAcademieInfo()
    {
        return [
            'nom' => "ACADÉMIE D'AIX-MARSEILLE",
            'er_origine' => "ACADÉMIE D'AIX MARSEILLE",
        ];
    }

    protected function getEtablissementInfo()
    {
        return [
            'code' => '0040022C',
            'nom' => 'CLG GASSENDI - DIGNE LES BAINS',
            'statut' => 'PUBLIC E.N',
            'nature' => 'COLLEGE',
        ];
    }

    protected function getSpecialitesInfo()
    {
        return [
            'Histoire-géographie, géopolitique et sciences politiques',
            'Humanités, littérature et philosophie',
            'Mathématiques',
        ];
    }

    protected function getFormePassageInfo()
    {
        return [
            'premiere' => 'Contrôle continu y compris EPS (B)',
            'terminale' => 'Contrôle continu y compris EPS (B)',
        ];
    }

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    #[Title('Détail de la candidature')]
    public function render()
    {
        return view('livewire.show-candidate', [
            'candidate' => $this->candidate,
            'academie' => $this->getAcademieInfo(),
            'etablissement' => $this->getEtablissementInfo(),
            'specialites' => $this->getSpecialitesInfo(),
            'formePassage' => $this->getFormePassageInfo(),
        ]);
    }
}
