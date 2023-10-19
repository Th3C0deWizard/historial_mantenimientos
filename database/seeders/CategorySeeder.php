<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Instalación de software',
        ]);

        Category::create([
            'name' => 'Mantenimiento preventivo',
        ]);

        Category::create([
            'name' => 'Mantenimiento correctivo',
        ]);

        Category::create([
            'name' => 'cambio de hardware',
        ]);
    }
}
