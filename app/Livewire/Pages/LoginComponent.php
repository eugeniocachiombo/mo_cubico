<?php

namespace App\Livewire\Pages;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginComponent extends Component
{
    public $emailphone, $password, $remember_me;

    public $rules = [
        "emailphone" => "required",
        "password" => "required",
    ];

    public $messages = [
        "emailphone.required" => "Campo obrigatório",
        "password.required" => "Campo obrigatório"
    ];

    public function render()
    {
        return view('livewire.pages.login-component')
        ->layout("components.layouts.pages.app");
    }

    public function authenticate(){
        $this->validate();
        $credentials = $this->check_email_phone($this->emailphone, $this->password);
        if (Auth::attempt($credentials)) {
           $this->remember_login();
           return redirect()->route("home.dashboard");
        } else {
            $this->dispatch('alerta', [
                'icon' => 'error',
                'btn' => true,
                'title' => 'Falha',
                'html' => 'Dados Incorretos'
            ]);
        }
    }

    public function check_email_phone($emailphone, $password)
    {
        if (is_numeric($emailphone)) {
            return [
                'phone' => $emailphone,
                'password' => $password,
            ];
        } else {
            return [
                'email' => $emailphone,
                'password' => $password,
            ];
        }
    }

    public function remember_login()
    {
        if ($this->remember_me == true) {
            cookie("sessao_iniciada", true, time() * 365);
        }
    }
   
}
