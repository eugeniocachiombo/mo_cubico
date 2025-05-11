<?php

namespace App\Livewire\Home;

use App\Models\Home;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.home.dashboard-component', [
            "total"  => $this->getHomes(),
            "pendings"  => Home::where("status", "pendente")->get(),
            "validates" => Home::where("status", "validados")->get(),
            "custumers" => User::where("access_id", 4)->get(),
            "intermediates" => User::where("access_id", 2)->get(),
            "owners" => User::where("access_id", 3)->get(),
        ])
        ->layout("components.layouts.app");
    }

    public function getHomes()
    {
        if (Gate::allows("admin") || Gate::allows("inquilino")) {
            return Home::all();
        } else {
            return Home::where("responsible", Auth::user()->id)->get();
        }
    }
}
