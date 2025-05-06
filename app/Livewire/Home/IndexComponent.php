<?php

namespace App\Livewire\Home;

use Livewire\Component;

class IndexComponent extends Component
{
    public function render()
    {
        return view('livewire.home.index-component')
        ->layout("components.layouts.pages.app");
    }
}
