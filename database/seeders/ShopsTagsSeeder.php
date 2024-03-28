<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ShopsTags;

class ShopsTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShopsTags::create([
            "id" => 1,
            "tag_id" => 1,
            "shop_id" => 1,
        ]);

        ShopsTags::create([
            "id" => 2,
            "tag_id" => 2,
            "shop_id" => 1,
        ]);
    }
}
