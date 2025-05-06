<?php

namespace App\Livewire\Home;

use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.home.dashboard-component')
        ->layout("components.layouts.app");
    }
}
