<?php

namespace App\Livewire\Components;

use Livewire\Attributes\On;
use Livewire\Component;

class Toast extends Component
{
    public $message1;
    public $message2;
    public $type = 'success';
    public $visible = false;

    #[On('toast')]
    public function computed($data)
    {
        $this->message1 = $data['message1'];
        $this->message2 = $data['message2'];
        $this->type = $data['type'];
        $this->visible = true;

        $this->dispatch('hide-toast', ['timeout' => 3000]);
    }

    public function render()
    {
        return view('livewire.toast');
    }
    // public function render()
    // {
    //     return view('livewire.toast');
    // }
}
