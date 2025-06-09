<?php

namespace App\Livewire;

use App\Models\Services as ModelsServices;
use Livewire\Component;

class ShowService extends Component
{
    public $service;

    public function mount($services_id)
    {
        $this->service = ModelsServices::findOrFail($services_id);
    }

    public function render()
    {
        return view('livewire.show-service')->layout('index');
    }
}
