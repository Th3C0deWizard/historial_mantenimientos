<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Observation;

class ObservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //make observations for the computers, 3 for each computer in ComputerSeeder
        //with different messages and categories.

        Observation::unguard();

        Observation::create([
            'message' => 'El computador no enciende',
            'category_id' => 3,
            'created_by' => 1,
            'computer_id' => 1,
        ]);

        Observation::create([
            'message' => 'Instalación de slendytubbies',
            'category_id' => 1,
            'created_by' => 1,
            'computer_id' => 1,
        ]);

        Observation::create([
            'message' => 'Limipieza de cucarachas',
            'category_id' => 2,
            'created_by' => 1,
            'computer_id' => 1,
        ]);

        Observation::create([
            'message' => 'Cambio de tarjeta RAM',
            'category_id' => 4,
            'created_by' => 1,
            'computer_id' => 2,
        ]);

        Observation::create([
            'message' => 'Cambio de tarjeta de video',
            'category_id' => 4,
            'created_by' => 1,
            'computer_id' => 2,
        ]);

        Observation::create([
            'message' => 'Cambio de tarjeta de red',
            'category_id' => 4,
            'created_by' => 1,
            'computer_id' => 2,
        ]);

        Observation::create([
            'message' => 'Instalación de maincra',
            'category_id' => 1,
            'created_by' => 1,
            'computer_id' => 3,
        ]);

        Observation::create([
            'message' => 'Instalación de wordpress',
            'category_id' => 1,
            'created_by' => 1,
            'computer_id' => 3,
        ]);

        Observation::create([
            'message' => 'Instalación de facebook',
            'category_id' => 1,
            'created_by' => 1,
            'computer_id' => 3,
        ]);
    }
}
