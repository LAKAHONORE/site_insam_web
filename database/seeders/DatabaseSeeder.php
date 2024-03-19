<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Ecole;
use Illuminate\Database\Seeder;

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
        Ecole::create([
            'code'=>'INSAM',
            'intitule'=>'institut de l\'estuaire',
            'slug'=>'institut-de-l-estuaire'
        ]);

        Ecole::create([
            'code'=>'ISTE',
            'intitule'=>'institut de Technologie',
            'slug'=>'institut-de-technologie'
        ]);
    }
}
