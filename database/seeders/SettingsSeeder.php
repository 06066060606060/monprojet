<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class SettingsSeeder extends Seeder
{
    /**
     * The settings to add.
     */


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::create( [
            'key'         => 'contact_email',
            'name'        => 'Email de contact',
            'description' => 'Adresse email du form contact',
            'value'       => 'oceane.argelas@gmail.com',
            'field'       => '{"name":"value","label":"Value","type":"email"}',
            'active'      => 1,
        ]);

        Settings::create( [
            'key'         => 'about_text',
            'name'        => 'A propos',
            'description' => 'Texte page mon projet',
            'value'       => 'dfghjpôiukyjhgfdsfertyuiompùimlukjyhtgrfrgthyjukilo',
            'field'       => '{"name":"value","label":"Value","type":"textarea"}',
            'active'      => 1,
        ]);
    }
}
