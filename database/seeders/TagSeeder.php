<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create([
            "id" => 1,
            "name" => "Tech",
            "slug" => "tech",
        ]);

        Tag::create([
            "id" => 2,
            "name" => "Bag",
            "slug" => "bag",
        ]);

        Tag::create([
            "id" => 3,
            "name" => "Bike",
            "slug" => "bike",
        ]);

        Tag::create([
            "id" => 4,
            "name" => "Water",
            "slug" => "water",
        ]);
    }
}
