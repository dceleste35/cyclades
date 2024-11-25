<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class ManageApplications extends Component
{
    #[Title('Inscription - Gérer les inscriptions')]
    public function render()
    {
        return view('livewire.manage-applications');
    }
}
