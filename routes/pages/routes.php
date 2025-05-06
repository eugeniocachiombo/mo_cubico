<?php


use App\Livewire\Pages\LoginComponent;
use App\Livewire\Pages\ErrorComponent;
use Illuminate\Support\Facades\Route;


Route::get('/autenticação', LoginComponent::class)->name("pages.login");
Route::fallback(ErrorComponent::class);