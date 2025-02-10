<?php

use App\Livewire\Home\Inicio;
use Illuminate\Support\Facades\Route;


Route::get('/inicio', Inicio::class)->name("inicio");
