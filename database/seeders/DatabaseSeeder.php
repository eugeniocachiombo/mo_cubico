<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Access;
use App\Models\Address;
use App\Models\Municipality;
use App\Models\Province;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Create access type
        $this->create_type_access("admin");
        $this->create_type_access("intermediário");
        $this->create_type_access("arrendador");
        $this->create_type_access("inquilino");

        // Create province
        $this->create_province("Luanda");

        // Create municipality
        $this->create_municipality("Cacuaco", 1);
        $this->create_municipality("Cazenga", 1);
        $this->create_municipality("Viana", 1);
        $this->create_municipality("Belas", 1);
        $this->create_municipality("Talatona", 1);

        // Create address
        $this->create_address("Cuca", 1, 2);
        $this->create_address("Hoji-ya-henda", 1, 2);
        $this->create_address("Vidrul", 1, 1);
        $this->create_address("Talatona", 1,5);
        $this->create_address("Rotunda da fubú", 1,5);
        $this->create_address("Camama", 1,5);
        $this->create_address("Benfica", 1, 4);
        $this->create_address("Futungo", 1, 4);
        $this->create_address("Samba", 1, 4);

        // Create admin
        $this->create_admin();
    }

    public function create_type_access($desc)
    {
        Access::create([
            "description" => $desc,
        ]);
    }

    public function create_province($desc)
    {
        Province::create([
            "description" => $desc,
        ]);
    }

    public function create_municipality($desc, $province_id)
    {
        Municipality::create([
            "description" => $desc,
            "province_id" => $province_id,
        ]);
    }

    public function create_address($desc, $prov, $muni)
    {
        Address::create([
            "description" => $desc,
            "province_id" => $prov,
            "municipality_id" => $muni
        ]);
    }

    public function create_admin()
    {
        User::create([
            "first_name" => "User",
            "last_name" => "Admin",
            'email' => "admin@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            "gender" => "Masculino",
            "birth_date" => "1990-04-02",
            "nif" => "123456789LA123",
            "address_id" => 1,
            "phone" => 911111111,
            "access_id" => 1,
        ]);
    }
}
