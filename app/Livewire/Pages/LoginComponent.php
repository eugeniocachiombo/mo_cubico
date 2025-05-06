<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class LoginComponent extends Component
{
    public function render()
    {
        return view('livewire.pages.login-component')
        ->layout("components.layouts.pages.app");
    }
}
