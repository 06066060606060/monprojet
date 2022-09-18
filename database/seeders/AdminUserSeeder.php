<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{

    public function run()
    {
        User::create(['name' => 'Mika', 'email' => 'xmicky@hotmail.fr',  'password' => bcrypt('123456')]);
        User::create(['name' => 'Oce', 'email' => 'oceane.argelas@gmail.com',  'password' => bcrypt('123456')]);
    }
}
