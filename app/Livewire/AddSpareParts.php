<?php

namespace App\Livewire;

use App\Models\SpareParts;
use App\Models\Workshops;
use Livewire\Component;

class AddSpareParts extends Component
{
    public $workshop_id;
    public $spareparts_name = '';
    public $spareparts_description = '';
    public $spareparts_price = '';
    public $spareparts_stock = '';
    public $all_workshops;

    public function mount()
    {
        $this->all_workshops = Workshops::all();
    }

    public function save()
    {
        $this->validate([
            'spareparts_name' => 'required|string|max:255',
            'spareparts_description' => 'nullable|string|max:1000',
            'spareparts_price' => 'required|numeric|min:0',
            'spareparts_stock' => 'required|integer|min:0',
            'workshop_id' => 'required|exists:workshops,id',
        ]);

        $spareParts = new SpareParts();
        $spareParts->workshop_id = $this->workshop_id;
        $spareParts->name = $this->spareparts_name;
        $spareParts->description = $this->spareparts_description;
        $spareParts->price = $this->spareparts_price;
        $spareParts->stock = $this->spareparts_stock;
        $spareParts->save();

        return $this->redirect('/dashboard/admin/spareparts', navigate: true);
    }
    public function render()
    {
        return view('livewire.add-spare-parts')->layout('index');
    }
}
