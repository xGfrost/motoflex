<?php

namespace App\Livewire;

use App\Models\Services;
use App\Models\Workshops;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddServices extends Component
{
    public $workshop_id;
    public $workshop;
    public $services_name = '';
    public $services_description = '';
    public $services_price = '';
    public $services_duration = '';
    public $all_workshops;

    public function mount()
    {
        $this->all_workshops = Workshops::all();
        $user = Auth::user();
        $this->workshop = $user->workshop;
        $this->workshop_id = $this->workshop?->id;
    }

    public function save(){
        $this->validate([
            'services_name' => 'required|string|max:255',
            'services_description' => 'nullable|string|max:1000',
            'services_price' => 'required|numeric|min:0',
            'services_duration' => 'required|integer|min:1',
            'workshop_id' => 'required|exists:workshops,id',
        ]);
        $services = new Services();
        $services->workshop_id = $this->workshop_id;
        $services->name = $this->services_name;
        $services->description = $this->services_description;
        $services->price = $this->services_price;
        $services->duration = $this->services_duration;
        $services->save();

        return $this->redirect('/dashboard/admin/services', navigate: true);
    }

    public function render()
    {
        return view('livewire.add-services')->layout('index');
    }
}
