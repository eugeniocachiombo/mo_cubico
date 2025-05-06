<?php

namespace App\Livewire\Home;

use App\Models\User;
use App\Notifications\Msg;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;
use PhpParser\Node\Stmt\TryCatch;

class Inicio extends Component
{
    public function mount() {}

    public function render()
    {
        return view('livewire.home.inicio')
            ->layout("components.layouts.app");
    }

    public function enviar()
    {
        try {
            $var = 50;
        //    dd($var / 0);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function save()
    {
        try {
            $var = 50;
            dd($var / 0);
            User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => Hash::make('123456789')
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
