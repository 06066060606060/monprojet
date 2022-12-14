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
        Settings::firstOrCreate(
            ['key' => 'contact_email'], 
            [
            'key'         => 'contact_email',
            'name'        => 'Email de contact',
            'description' => 'Adresse email du form contact',
            'value'       => 'oceane.argelas@gmail.com',
            'field'       => '{"name":"value","label":"Value","type":"email"}',
            'active'      => 1,
        ]);

        Settings::firstOrCreate(
            ['key' => 'url_cv'], 
             [
            'key'         => 'url_cv',
            'name'        => 'Popup du Curriculum Vitae',
            'description' => 'Url du CV (.docx)',
            'value'       => 'http://geograff.sc2lgvu9627.universe.wf/img/CV-ACADEMIQUE.docx',
            'field'       => '{"name":"value","label":"Value","type":"text"}',
            'active'      => 1,
        ]);

            Settings::firstOrCreate(
            ['key' => 'about_text'], 
             [
            'key'         => 'about_text',
            'name'        => 'A propos',
            'description' => 'Texte page mon projet',
            'value'       => 'Etude de cas sur l’art urbain et le street-art à La Réunion:
            Quels impacts sur le territoire et la société réunionnaise ?
            
            Etude géographique sur la présence du graffiti dans l’île et de la manière dont cet art s’insère dans le paysage réunionnais et collabore avec ses divers acteurs.
            ',
            'field'       => '{"name":"value","label":"Value","type":"textarea"}',
            'active'      => 1,
        ]);
    }
}
