<?php

namespace App\Livewire\HomeRent;

use Livewire\Component;

class HomeRentComponent extends Component
{
    public function render()
    {
        return view('livewire.home-rent.home-rent-component')
        ->layout("components.layouts.app");
    }
}
