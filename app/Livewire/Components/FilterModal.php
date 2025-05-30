<?php

namespace App\Livewire\Components;

use Livewire\Component;

class FilterModal extends Component
{
    public $categories;
    public $selectedCategories = [];
    public $checked = [];
    public string $title;

    public function mount($selectedCategories = [])
    {
        $this->selectedCategories = $selectedCategories;
    }

    public function applyFilter()
    {
        $this->dispatch('filterApplied', $this->selectedCategories);
    }

    public function resetFilter()
    {
        $this->dispatch('filterApplied', []);
    }

    public function render()
    {
        return view('livewire.filter-modal', [
            "selectedCategories" => $this->selectedCategories,
        ]);
    }
    // public function render()
    // {
    //     return view('livewire.filter-modal');
    // }
}
