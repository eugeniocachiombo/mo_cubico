<?php

use App\Livewire\Home\DashboardComponent;
use App\Livewire\Home\IndexComponent;
use Illuminate\Support\Facades\Route;


Route::get('/', IndexComponent::class)->name("home.index");
Route::get('/painel-principal', DashboardComponent::class)->name("home.dashboard");
