<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class ErrorComponent extends Component
{
    public function render()
    {
        return view('livewire.pages.error-component')
        ->layout("components.layouts.pages.app");
    }
}
