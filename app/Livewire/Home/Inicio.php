<?php

namespace App\Livewire\Home;

use App\Notifications\Msg;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class Inicio extends Component
{
    public function mount(){

    }

    public function render()
    {
        return view('livewire.home.inicio')
        ->layout("components.layouts.app");
    }

    public function enviar(){
        Notification::send(Auth::user()->id, new Msg("Olá Génio"));
    }
}
