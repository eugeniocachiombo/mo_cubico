<?php

namespace App\Livewire\Home;

use App\Models\Home as HomeRent;
use Livewire\{Component, WithPagination};

class IndexComponent extends Component
{
    use WithPagination;
    
    public function render()
    {
        return view('livewire.home.index-component', [
            'homes' => HomeRent::where("status", "pendente")
            ->orderBy('id', 'desc')
            ->get(),
        ])
        ->layout("components.layouts.pages.app");
    }
}
