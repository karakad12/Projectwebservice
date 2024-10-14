<?php

namespace Database\Seeders;

use App\Models\Dispensary;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DispensarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            Dispensary::create([
                'name' => $faker->word,
                'benefit' => $faker->sentence,
                'price' => $faker->randomFloat(2, 10, 500),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
