<?php

use App\Http\Middleware\OnlyUserLoged;
use App\Livewire\User\ConfigurationComponent;
use App\Livewire\User\ProfileComponent;
use Illuminate\Support\Facades\Route;


Route::get('/perfil', ProfileComponent::class)->name("user.profile")->middleware(OnlyUserLoged::class);
Route::get('/configurações', ConfigurationComponent::class)->name("user.config")->middleware(OnlyUserLoged::class);
