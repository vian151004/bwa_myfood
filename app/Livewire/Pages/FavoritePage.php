<?php

namespace App\Livewire\Pages;

use App\Livewire\Traits\CategoryFilterTrait;
use App\Models\Category;
use App\Models\Foods;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class FavoritePage extends Component
{
    use CategoryFilterTrait;
    
    public $categories;
    public $selectedCategories = [];
    public $items;
    public $title = "Favorite";

    public function mount(Foods $foods)
    {
        $this->categories = Category::all();
        $this->items = $foods->getFavoriteFood();
    }

    #[Layout('components.layouts.page')]
    public function render()
    {
        $filteredProducts = $this->getFilteredItems();

        return view('product.favorite', [
            'filteredProducts' => $filteredProducts,
        ]);
    }
    // public function render()
    // {
    //     return view('livewire.pages.favorite-page');
    // }
}
