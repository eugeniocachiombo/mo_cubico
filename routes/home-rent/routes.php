<?php

use App\Http\Middleware\OnlyUserLoged;
use App\Livewire\HomeRent\HomeRentComponent;
use Illuminate\Support\Facades\Route;

Route::get('/imovéis/registros', HomeRentComponent::class)->name("home-rent")->middleware(OnlyUserLoged::class);
