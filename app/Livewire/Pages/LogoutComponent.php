<?php

namespace App\Livewire\Pages;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LogoutComponent extends Component
{
    public function render()
    {
        $this->logout();
        return view('livewire.pages.logout-component')
        ->layout("components.layouts.pages.app");
    }

    public function logout(){
        Auth::logout();
        cookie("sessao_iniciada", false, 0);
        $this->dispatch('atrazar_redirect', [
            'path' => '/',
            'time' => 3000
        ]);
    }
}
