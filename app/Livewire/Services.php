<?php

namespace App\Livewire;

use App\Models\Services as ModelsServices;
use Livewire\Component;

class Services extends Component
{
    public $perPage = 5;
    public $sortBy = 'created_at';
    public $sortDir = 'DESC';
    public $search = '';
    public $showFallback = false;

    public function setSortBy($sortColumn)
    {
        if ($this->sortBy == $sortColumn) {
            $this->sortDir = ($this->sortDir == 'ASC') ? 'DESC' : 'ASC';
            return;
        }

        $this->sortBy = $sortColumn;
        $this->sortDir = 'ASC';
    }

    public function delete($id)
    {
        $services = ModelsServices::find($id);

        $services->delete();

        return $this->redirect('/dashboard/admin/services', navigate: true);
    }

    public function render()
    {
        $query = ModelsServices::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        $services = $query->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);

        if ($this->search && $services->isEmpty()) {
            $this->showFallback = true;
            $services = ModelsServices::orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage);
        } else {
            $this->showFallback = false;
        }

        return view('livewire.services', compact('services'))->layout('index');
    }
}
