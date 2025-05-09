<?php

use App\Http\Middleware\OnlyUserLoged;
use App\Http\Middleware\OnlyUserNotLoged;
use App\Livewire\Home\DashboardComponent;
use App\Livewire\Home\IndexComponent;
use Illuminate\Support\Facades\Route;


Route::get('/', IndexComponent::class)->name("home.index")->middleware(OnlyUserNotLoged::class);
Route::get('/painel-principal', DashboardComponent::class)->name("home.dashboard")->middleware(OnlyUserLoged::class);
