<?php

namespace App\Livewire;

use App\Models\SpareParts;
use App\Models\Workshops;
use Livewire\Component;

class EditSpareParts extends Component
{
    public $spareparts_name = '';
    public $spareparts_description = '';
    public $spareparts_price = '';
    public $spareparts_stock = '';
    public $workshop_id;
    public $all_workshops;
    public $spareparts_details;
    public function mount($id)
    {
        $this->spareparts_details = SpareParts::find($id);
        $this->workshop_id = $this->spareparts_details->workshop_id;
        $this->spareparts_name = $this->spareparts_details->name;
        $this->spareparts_description = $this->spareparts_details->description;
        $this->spareparts_price = $this->spareparts_details->price;
        $this->spareparts_stock = $this->spareparts_details->stock;

        $this->all_workshops = Workshops::all();
    }
    public function update()
    {
        $this->validate([
            'spareparts_name' => 'required|string|max:255',
            'spareparts_description' => 'nullable|string|max:1000',
            'spareparts_price' => 'required|numeric|min:0',
            'spareparts_stock' => 'required|integer|min:0',
            'workshop_id' => 'required|exists:workshops,id',
        ]);

        $this->spareparts_details->update([
            'workshop_id' => $this->workshop_id,
            'name' => $this->spareparts_name,
            'description' => $this->spareparts_description,
            'price' => $this->spareparts_price,
            'stock' => $this->spareparts_stock,
        ]);

        return $this->redirect('/dashboard/admin/spareparts', navigate: true);
    }
    public function render()
    {
        return view('livewire.edit-spare-parts')->layout('index');
    }
}
