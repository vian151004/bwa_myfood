<?php

namespace App\Livewire\Pages;

use App\Livewire\Traits\CategoryFilterTrait;
use App\Models\Category;
use App\Models\Foods;
use Livewire\Attributes\Layout;
use Livewire\Component;

class PromoPage extends Component
{
    use CategoryFilterTrait;
    public $categories;
    public $selectedCategories = [];
    public $items;
    public $title = "Promo";
    public function mount(Foods $foods)
    {
        $this->categories = Category::all();
        $this->items = $foods->getPromo();
    }

    #[Layout('components.layouts.page')]
    public function render()
    {
        $filteredProducts = $this->getFilteredItems();

        return view('product.promo', [
            'filteredProducts' => $filteredProducts,
        ]);
    }
    // public function render()
    // {
    //     return view('livewire.pages.promo-page');
    // }
}
