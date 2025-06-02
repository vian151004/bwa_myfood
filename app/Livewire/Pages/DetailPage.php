<?php

namespace App\Livewire\Pages;

use App\Models\Category;
use App\Models\Foods;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class DetailPage extends Component
{
    public $categories;
    public $matchedCategory;
    public $food;
    public $title = "Favorite";

    public function mount(Foods $foods, $id)
    {
        $this->categories = Category::all();

        $this->food = $foods->getFoodDetails($id)->first();

        if (empty($this->food)) {
            abort(404);
        }

        $this->matchedCategory = collect($this->categories)->firstWhere('id', $this->food->categories_id);
    }
    
    public function addToCart()
    {
        $cartItems = session('cart_items', []);

        $existingItemIndex = collect($cartItems)->search(fn($item) => $item['id'] === $this->food->id);

        if ($existingItemIndex !== false) {
            $cartItems[$existingItemIndex]['quantity'] += 1;
        } else {
            $cartItems[] = array_merge(
                (array)$this->food,
                [
                    'quantity' => 1,
                    'selected' => true,
                ]
            );
        }
    
        session(['cart_items' => $cartItems]);
        session(['has_unpaid_transaction' => false]);
    
        $this->dispatch('toast', 
            data: [
                'message1' => 'Item added to cart',
                'message2' => $this->food->name,
                'type' => 'success',
            ]
        );
    }

    public function orderNow()
    {
        $this->addToCart();
        return redirect()->route('payment.checkout');
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('product.details');
    }
    // public function render()
    // {
    //     return view('livewire.pages.detail-page');
    // }
}
