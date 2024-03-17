<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shop::create([
            'city_id' => 1,
            'name' => fake()->words(2, true),
        ]);
        Shop::create([
            'city_id' => 1,
            'name' => fake()->words(2, true),
        ]);
        Shop::create([
            'city_id' => 2,
            'name' => fake()->words(2, true),
        ]);
        Shop::create([
            'city_id' => 3,
            'name' => fake()->words(2, true),
        ]);
        Shop::create([
            'city_id' => 4,
            'name' => fake()->words(2, true),
        ]);
        Shop::create([
            'city_id' => 2,
            'name' => fake()->words(2, true),
        ]);
        Shop::create([
            'city_id' => 1,
            'name' => fake()->words(2, true),
        ]);
        Shop::create([
            'city_id' => 1,
            'name' => fake()->words(2, true),
        ]);
        Shop::create([
            'city_id' => 2,
            'name' => fake()->words(2, true),
        ]);
        Shop::create([
            'city_id' => 1,
            'name' => fake()->words(2, true),
        ]);
        Shop::create([
            'city_id' => 2,
            'name' => fake()->words(2, true),
        ]);
        Shop::create([
            'city_id' => 1,
            'name' => fake()->words(2, true),
        ]);
    }
}
