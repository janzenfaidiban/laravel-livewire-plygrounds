<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use Faker\Factory as Faker;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Country::create([
            'name' => 'Papua New Guinea',
            'slug' => 'papua-new-guinea',
            'flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e3/Flag_of_Papua_New_Guinea.svg/227px-Flag_of_Papua_New_Guinea.svg.png',
        ]);
        Country::create([
            'name' => 'Solomon Islands',
            'slug' => 'solomon-islands',
            'flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/74/Flag_of_the_Solomon_Islands.svg/125px-Flag_of_the_Solomon_Islands.svg.png',
        ]);
        Country::create([
            'name' => 'Vanuatu',
            'slug' => 'vanuatu',
            'flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Flag_of_Vanuatu.svg/125px-Flag_of_Vanuatu.svg.png',
        ]);
        Country::create([
            'name' => 'Fiji',
            'slug' => 'fiji',
            'flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Flag_of_Fiji.svg/125px-Flag_of_Fiji.svg.png',
        ]);
        Country::create([
            'name' => 'New Caledonia',
            'slug' => 'new-caledonia',
            'flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/66/Flag_of_FLNKS.svg/175px-Flag_of_FLNKS.svg.png',
        ]);  
        Country::create([
            'name' => 'Australia',
            'slug' => 'australia',
            'flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/88/Flag_of_Australia_%28converted%29.svg/125px-Flag_of_Australia_%28converted%29.svg.png',
        ]); 
        Country::create([
            'name' => 'Kiribati',
            'slug' => 'kiribati',
            'flag' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Flag_of_Kiribati.svg/125px-Flag_of_Kiribati.svg.png',
        ]);      
    }
}
