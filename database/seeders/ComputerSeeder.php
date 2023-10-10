<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Computer;

class ComputerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Computer::unguard();

        Computer::create([
            'name' => 's1e1',
            'brand' => 'Asus',
            'ram' => 16,
            'cpu' => 'Intel i5',
            'owner' => 1
        ]);

        Computer::create([
            'name' => 's1e2',
            'brand' => 'HP',
            'ram' => 32,
            'cpu' => 'Intel i7',
            'owner' => 1
        ]);

        Computer::create([
            'name' => 's2e1',
            'brand' => 'Lenovo',
            'ram' => 8,
            'cpu' => 'AMD Ryzen 7',
            'owner' => 1
        ]);


        Computer::reguard();
    }
}
