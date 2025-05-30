<?php

namespace App\Livewire\Components;

use Livewire\Component;

class MenuItemList extends Component
{
    public $items;
    public bool $withCheckbox = true;

    public function mount($items)
    {
        $this->items = $items;
    }

    public function render()
    {
        return view('livewire.menu-item-list');
    }
    // public function render()
    // {
    //     return view('livewire.menu-item-list');
    // }
}
