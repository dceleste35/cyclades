<?php

namespace App\Livewire;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ShowCandidates extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search'];

    public Collection $candidats;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->candidats = session('candidats');
    }

    public function showCandidate($id)
    {
        $this->redirectRoute('inscription.manage.profile', ['candidate' => Candidate::find($id)]);
    }

    #[Title('Liste des candidatures')]
    public function render()
    {
        $ids = $this->candidats->pluck('id')->toArray();

        $paginated = Candidate::whereIn('id', $ids)
            ->paginate(10);

        return view('livewire.show-candidates', [
            'paginated' => $paginated,
        ]);
    }
}
