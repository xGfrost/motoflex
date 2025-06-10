<?php

namespace App\Livewire;

use Livewire\Component;

class EditSpareParts extends Component
{
    public $spare_parts_name = '';
    public $spare_parts_description = '';
    public $spare_parts_price = '';
    public $spare_parts_stock = '';
    public $workshop_id;
    public $all_workshops;
    public $spare_parts_details;
    public function mount($id)
    {
        $this->spare_parts_details = SpareParts::find($id);
        $this->workshop_id = $this->spare_parts_details->workshop_id;
        $this->spare_parts_name = $this->spare_parts_details->name;
        $this->spare_parts_description = $this->spare_parts_details->description;
        $this->spare_parts_price = $this->spare_parts_details->price;
        $this->spare_parts_stock = $this->spare_parts_details->stock;

        $this->all_workshops = Workshops::all();
    }
    public function update()
    {
        $this->validate([
            'spare_parts_name' => 'required|string|max:255',
            'spare_parts_description' => 'nullable|string|max:1000',
            'spare_parts_price' => 'required|numeric|min:0',
            'spare_parts_stock' => 'required|integer|min:0',
            'workshop_id' => 'required|exists:workshops,id',
        ]);

        $this->spare_parts_details->update([
            'workshop_id' => $this->workshop_id,
            'name' => $this->spare_parts_name,
            'description' => $this->spare_parts_description,
            'price' => $this->spare_parts_price,
            'stock' => $this->spare_parts_stock,
        ]);

        return $this->redirect('/dashboard/admin/spareparts', navigate: true);
    }
    public function render()
    {
        return view('livewire.edit-spare-parts')->layout('index');
    }
}
