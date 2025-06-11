<?php

namespace App\Livewire;

use App\Models\Services;
use App\Models\Workshops;
use Livewire\Component;

class EditServices extends Component
{
    public $services_name = '';
    public $services_description = '';
    public $services_price = '';
    public $services_duration = '';
    public $workshop_id;
    public $all_workshops;
    public $service_details;

    public function mount($id)
    {
        $this->service_details = Services::find($id);
        $this->workshop_id = $this->service_details->workshop_id;
        $this->services_name = $this->service_details->name;
        $this->services_description = $this->service_details->description;
        $this->services_price = $this->service_details->price;
        $this->services_duration = $this->service_details->duration;

        $this->all_workshops = Workshops::all();
    }

    public function update(){
        $this->validate([
            'services_name' => 'required|string|max:255',
            'services_description' => 'nullable|string|max:1000',
            'services_price' => 'required|numeric|min:0',
            'services_duration' => 'required|integer|min:1',
            'workshop_id' => 'required|exists:workshops,id',
        ]);

        $this->service_details->update([
            'workshop_id' => $this->workshop_id,
            'name' => $this->services_name,
            'description' => $this->services_description,
            'price' => $this->services_price,
            'duration' => $this->services_duration,
        ]);

        return $this->redirect('/dashboard/admin/services', navigate: true);
    }

    public function render()
    {
        return view('livewire.edit-services')->layout('index');
    }
}
