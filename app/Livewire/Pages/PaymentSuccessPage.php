<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Component;

class PaymentSuccessPage extends Component
{
    public function mount() {
        session()->forget([
            'external_id',
            'has_unpaid_transaction',
            'cart_items',
            'payment_token'
        ]);

        session()->save();
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('payment.success');
    }
    // public function render()
    // {
    //     return view('livewire.pages.payment-success-page');
    // }
}
