<?php

namespace App\Livewire;

use App\Models\Candidate;
use Livewire\Component;

class ShowCandidate extends Component
{
    public Candidate $candidat;

    public function mount(Candidate $candidate)
    {
        $this->candidat = $candidate;
    }

    public function render()
    {
        return view('livewire.show-candidate');
    }
}
