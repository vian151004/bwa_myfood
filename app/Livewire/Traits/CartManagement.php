<?php

namespace App\Livewire\Traits;

trait CartManagement
{
    public function increment($index) {
        $this->cart[$index]['quantity']++;
        $this->hasUnpaidItems = false;
        $this->updateTotals();
    }

    public function decrement($index) {
        if ($this->cartItems[$index]['quantity'] > 1) {
            $this->cartItems[$index]['quantity']--;
        }
        $this->hasUnpaidItems = false;
        $this->updateTotals();
    }

    public function updateTotals() {
        $this->subtotal = array_sum(array_map(function ($item) {
            $price = $item['is_promo'] ? $item['price_afterdiscount'] : $item['price'];
            return $price * $item['quantity'];
        }, $this->cartItems));
        $this->tax = $this->subtotal * 0.11; // Assuming a 11% tax rate
        $this->total = $this->subtotal + $this->tax;
    }
}