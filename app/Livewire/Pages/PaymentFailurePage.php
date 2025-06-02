<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Component;

class PaymentFailurePage extends Component
{
    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('payment.failure');
    }
    // public function render()
    // {
    //     return view('livewire.pages.payment-failure-page');
    // }
}
