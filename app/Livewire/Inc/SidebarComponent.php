<?php

namespace App\Livewire\Inc;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class SidebarComponent extends Component
{
    public $route;
    
    public function mount(){
       $this->route = Route::currentRouteName();
    }
    public function render()
    {
        return view('livewire.inc.sidebar-component');
    }
}
