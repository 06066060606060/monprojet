<?php

namespace Database\Seeders;

use App\Models\Regions;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Schema;

class RegionSeeder extends Seeder
{

    public function run()
    {
        Regions::create(['region' => 'Nord', 'latitude' => '-20.88',  'longitude' => '55.45', 'zoom' => '14']);
        Regions::create(['region' => 'Sud', 'latitude' => '-21.31',  'longitude' => '55.50', 'zoom' => '14']);
        Regions::create(['region' => 'Ouest', 'latitude' => '-21.05',  'longitude' => '55.27', 'zoom' => '14']);
        Regions::create(['region' => 'Est', 'latitude' => '-21.01',  'longitude' => '55.68', 'zoom' => '14']);
    }
}
