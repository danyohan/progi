<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Fee;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Fee::create([
            'name' => 'basic',
            'type' => 'assoc',
            'value' => 10,
            'minimum' => 10,
            'maximum' => 50,
            'vehicleType' => 'Common'
        ]);

        Fee::create([
            'name' => 'basic',
            'type' => 'assoc',
            'value' => 10,
            'minimum' => 25,
            'maximum' => 200,
            'vehicleType' => 'Luxury'
        ]);

        Fee::create([
            'name' => 'special',
            'type' => 'assoc',
            'value' => 2,
            'vehicleType' => 'Common'
        ]);

        Fee::create([
            'name' => 'special',
            'type' => 'assoc',
            'value' => 4,
            'vehicleType' => 'Luxury'
        ]);

        Fee::create([
            'name' => 'association',
            'type' => 'assoc',
            'value' => 5,
            'minimum' => 1,
            'maximum' => 500
        ]);

        Fee::create([
            'name' => 'association',
            'type' => 'assoc',
            'value' => 10,
            'minimum' => 501,
            'maximum' => 1000
        ]);
        Fee::create([
            'name' => 'association',
            'type' => 'assoc',
            'value' => 15,
            'minimum' => 1001,
            'maximum' => 3000
        ]);
        Fee::create([
            'name' => 'association',
            'type' => 'assoc',
            'value' => 20,
            'minimum' => 3001
        ]);
        Fee::create([
            'name' => 'storage',
            'type' => 'fixed',
            'value' => 100
        ]);
    }
}
