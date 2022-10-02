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
        Regions::firstOrCreate(
            ['region' => 'Full'],
            ['region' => 'Full', 'latitude' => '-21.10',  'longitude' => '55.50', 'zoom' => '10']
        );
        Regions::firstOrCreate(
            ['region' => 'Nord'],
            ['region' => 'Nord', 'latitude' => '-20.88',  'longitude' => '55.45', 'zoom' => '11']
        );
        Regions::firstOrCreate(
            ['region' => 'Sud'],
            ['region' => 'Sud', 'latitude' => '-21.31',  'longitude' => '55.50', 'zoom' => '11']
        );
        Regions::firstOrCreate(
            ['region' => 'Ouest'],
            ['region' => 'Ouest', 'latitude' => '-21.05',  'longitude' => '55.27', 'zoom' => '11']
        );
        Regions::firstOrCreate(
            ['region' => 'Est'],
            ['region' => 'Est', 'latitude' => '-21.01',  'longitude' => '55.68', 'zoom' => '11']
        );
    }
}
