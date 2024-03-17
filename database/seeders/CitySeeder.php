<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        | ------------------------------------------------
        | Australia {id: 1}
        */
        City::create([
            'country_id' => 1,
            'name' => 'Canberra',
            'address' => 'Australian Capital Territory, Australia',
            'coordinates' => '-35.307,149.117',
            'coordinatesUrl' => 'https://www.openstreetmap.org/relation/2354197',
        ]);
        City::create([
            'country_id' => 1,
            'name' => 'Melbourne',
            'address' => 'City of Melbourne, Victoria, Australia',
            'coordinates' => '37.8268,144.9591',
            'coordinatesUrl' => 'https://www.openstreetmap.org/relation/4246124',
        ]);





        /*
        | ------------------------------------------------
        | Papua New Guinea {id: 2}
        */
        City::create([
            'country_id' => 2,
            'name' => 'Port Moresby',
            'address' => 'National Capital District, Southern Region, 121, Papua New Guinea',
            'coordinates' => '-9.513,147.211',
            'coordinatesUrl' => 'https://www.openstreetmap.org/node/230628786',
        ]);
        
        City::create([
            'country_id' => 2,
            'name' => 'Vanimo',
            'address' => 'Sandaun, Momase Region, Papua New Guinea',
            'coordinates' => '-2.659,141.339',
            'coordinatesUrl' => 'https://www.openstreetmap.org/relation/311777',
        ]);




        
        /*
        | ------------------------------------------------
        | Solomon Islands {id: 3}
        */
        City::create([
            'country_id' => 3,
            'name' => 'Honiara',
            'address' => 'Vavaea, Honiara, Solomon Islands',
            'coordinates' => '-9.4287,159.9589',
            'coordinatesUrl' => 'https://www.openstreetmap.org/relation/11972856',
        ]);
        City::create([
            'country_id' => 3,
            'name' => 'Ambu',
            'address' => 'Ambu, Malaita, Solomon Islands',
            'coordinates' => '-8.7758,160.7014',
            'coordinatesUrl' => 'https://www.openstreetmap.org/node/7992304469#map=15/-8.7734/160.7001',
        ]);
        




        /*
        | ------------------------------------------------
        | Vanuatu {id: 4}
        */
        City::create([
            'country_id' => 5,
            'name' => fake()->city,
            'address' => '',
            'coordinates' => '',
            'coordinatesUrl' => '',
        ]);



        
        /*
        | ------------------------------------------------
        | Fiji {id: 5}
        */
        City::create([
            'country_id' => 5,
            'name' => fake()->city,
            'address' => '',
            'coordinates' => '',
            'coordinatesUrl' => '',
        ]);



        
        /*
        | ------------------------------------------------
        | New Caledonia {id: 6}
        */
        City::create([
            'country_id' => 6,
            'name' => fake()->city,
            'address' => '',
            'coordinates' => '',
            'coordinatesUrl' => '',
        ]);



        
        /*
        | ------------------------------------------------
        | Kiribati {id: 7}
        */
        City::create([
            'country_id' => 7,
            'name' => fake()->city,
            'address' => '',
            'coordinates' => '',
            'coordinatesUrl' => '',
        ]);

    }
}
