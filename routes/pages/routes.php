<?php

use App\Http\Middleware\OnlyUserLoged;
use App\Http\Middleware\OnlyUserNotLoged;
use App\Livewire\Pages\LoginComponent;
use App\Livewire\Pages\ErrorComponent;
use App\Livewire\Pages\LogoutComponent;
use App\Livewire\Pages\SignupComponent;
use Illuminate\Support\Facades\Route;


Route::get('/autenticação', LoginComponent::class)->name("pages.login")->middleware(OnlyUserNotLoged::class);
Route::get('/conta/criar', SignupComponent::class)->name("pages.signup")->middleware(OnlyUserNotLoged::class);
Route::get('/terminando', LogoutComponent::class)->name("pages.logout")->middleware(OnlyUserLoged::class);
Route::fallback(ErrorComponent::class);