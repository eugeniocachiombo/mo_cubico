<?php


use App\Livewire\Pages\LoginComponent;
use App\Livewire\Pages\ErrorComponent;
use App\Livewire\Pages\SignupComponent;
use Illuminate\Support\Facades\Route;


Route::get('/autenticação', LoginComponent::class)->name("pages.login");
Route::get('/conta/criar', SignupComponent::class)->name("pages.signup");
Route::fallback(ErrorComponent::class);