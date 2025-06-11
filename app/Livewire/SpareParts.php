<?php

namespace App\Livewire;

use App\Models\SpareParts as ModelsSpareParts;
use Livewire\Component;

class SpareParts extends Component
{
    public $perPage = 5;
    public $sortBy = 'created_at';
    public $sortDir = 'DESC';
    public $search = '';
    public $showFallback = false;


    // protected $listeners = ['refresh' => '$refresh'];

    // public function updatedPerPage() {}

    public function setSortBy($sortColum)
    {
        if ($this->sortBy == $sortColum) {
            $this->sortDir = ($this->sortDir == 'ASC') ? 'DESC' : 'ASC';
            return;
        }

        $this->sortBy = $sortColum;
        $this->sortDir = 'ASC';
    }


    public function render()
    {
        $query = ModelsSpareParts::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        $spareparts = $query->orderBy($this->sortBy, $this->sortDir)
                            ->paginate($this->perPage);

        if ($this->search && $spareparts->isEmpty()) {
            $this->showFallback = true;
            $spareparts = ModelsSpareParts::orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage);
        } else {
            $this->showFallback = false;
        }

        return view('livewire.spare-parts', compact('spareparts'))->layout('index');
    }

}
