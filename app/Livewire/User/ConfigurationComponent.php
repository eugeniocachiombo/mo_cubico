<?php

namespace App\Livewire\User;

use App\Models\DarkMode;
use Livewire\Component;

class ConfigurationComponent extends Component
{
    public $darkmode;

    public function render()
    {
        $this->checkDarkMode();
        return view('livewire.user.configuration-component', [
            "darkmode" => auth()->user()->getDarkMode ?? ''
        ])
        ->layout("components.layouts.app");
    }

    public function checkDarkMode(){
        if (auth()->user()->getDarkMode) {
            $this->darkmode = true;
        }else{
            $this->darkmode = false;
        }
    }

    public function save(){
        $user = auth()->user(); 
        if ($this->darkmode) {
            DarkMode::create( [
                "user_id" => $user->id,
            ]);
        }else{
            $dark = DarkMode::where("user_id", $user->id)->first();
            $dark->delete();
        }
    }
}
