<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public string $title;
    public bool $showClose = false;

    // Create components instance
    public function __construct(string $title, bool $showClose = false)
    {
        $this->title = $title;
        $this->showClose = $showClose;
    }

    // Render the component view
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}