<?php

namespace Tests\Feature;

use App\Livewire\Home\Inicio;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class InicioTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        /*
        Livewire::test(Inicio::class)
        ->call('enviar');*/
        /*Livewire::test(Inicio::class)
        //->call("enviar")
        ->assertStatus(200);*/

       /* $this->get('/inicio')
            ->assertSeeLivewire(Inicio::class);~
            Livewire::test(Inicio::class)
            ->call("save")
            ->assertStatus(200);*/

            /*$this->get('/inicio/laravel')
            ->assertStatus(200);*/

            Livewire::test(Inicio::class)
           // ->call("save")
            ->call("enviar")
            ->assertStatus(200);

    }
}
