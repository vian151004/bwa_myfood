<?php

namespace App\Livewire\Pages;

use App\Models\Category;
use App\Models\Foods;
use Livewire\Attributes\Layout;
use Livewire\Component;

class HomePage extends Component
{
    public $promos;
    public $favorites;
    public $categories;

    public $tableNumber;
    public $name;
    public $phone;

    public $term = '';
    
    public bool $isCustomerDataComplete = true;

    public function mount(Foods $foods)
    {
        $this->categories = Category::all();
        $this->promos = $foods->getPromo();
        $this->favorites = $foods->getFavoriteFood();
        $this->tableNumber = session('table_number');

        $name = session('name');
        $phone = session('phone');

        if ($name && $phone) {
            $this->isCustomerDataComplete = false;
        }
    }

    public function saveUserInfo()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);
        
        session(['name' => $this->name, 'phone' => $this->phone]);
        $this->name = session('name');
    }

    #[Layout('components.layouts.page')]
    public function render(Foods $foods)
    {
        sleep(1);
        $searchResult = $foods->search(trim($this->term))->get();

        return view('home', [
            'searchResult' => $searchResult,
        ]);
    }
    // public function render()
    // {
    //     return view('livewire.pages.home-page');
    // }
}
