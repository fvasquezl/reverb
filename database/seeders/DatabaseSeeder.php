<?php

namespace Database\Seeders;

use App\Models\House;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ShieldSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Faustino Vasquez',
            'email' => 'fvasquez@local.com',
        ])->assignRole('super_admin');

        User::factory(10)->create();

        $houses = [
            ['name' => 'Tijuana', 'address' => '123 Main St'],
            ['name' => 'Rosarito', 'address' => '231 Main St'],
            ['name' => 'Cuesta Blanca', 'address' => '321 Main St']
        ];

        foreach ($houses as $house) {
            House::create([
                'name' => $house['name'],
                'address' => $house['address']
            ]);
        }
    }
}