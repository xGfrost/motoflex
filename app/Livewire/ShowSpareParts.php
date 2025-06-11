<?php

namespace App\Livewire;

use App\Models\SpareParts;
use Livewire\Component;

class ShowSpareParts extends Component
{
    public $spareparts;

    public function mount($spareparts_id)
    {
        $this->spareparts = SpareParts::findOrFail($spareparts_id);
    }
    public function render()
    {
        return view('livewire.show-spare-parts')->layout('index');
    }
}
