<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Component;

class ScanPage extends Component
{
    #[Layout('components.layouts.app')]
    public function render() {
        return view('product.scan');
    }
    // public function render()
    // {
    //     return view('livewire.pages.scan-page');
    // }
}
