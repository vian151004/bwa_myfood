<?php

namespace App\Livewire\Traits;
use Livewire\Attributes\On;
trait CategoryFilterTrait
{
    #[On('filterApplied')]
    public function applyFilter($selectedCategories)
    {
        $this->selectedCategory = $selectedCategories;  
    }

    public function getFilteredItems()
    {
        if (count($this->selectedCategories) > 0) {
            return $this->items->filter(function ($item) {
                return in_array($item->categories_id, $this->selectedCategories);
            });
        }
        return $this->items;
    }
}