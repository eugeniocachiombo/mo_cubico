<?php

use App\Livewire\Home\DashboardComponent;
use Illuminate\Support\Facades\Route;


Route::get('/painel-principal', DashboardComponent::class)->name("home.dashboard");
