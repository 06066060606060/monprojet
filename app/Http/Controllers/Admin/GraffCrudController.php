<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GraffRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Termwind\Components\Dd;

/**
 * Class GraffCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class GraffCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Graff::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/graff');
        CRUD::setEntityNameStrings('graff', 'graffs');
    }

    function getFieldsData()
    {
        $this->crud->addColumn([
            'name' => 'image',
            'label' => 'images',
            'type' => 'image',
            'prefix' => 'storage/',
            'height' => '80px',
            'width' => 'auto',

        ]);
    }


    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('nom');
        CRUD::column('description');
        CRUD::column('artiste');
        CRUD::column('adresse');
        CRUD::column('region');
        CRUD::column('ville');
        $this->getFieldsData();
        CRUD::column('latitude');
        CRUD::column('longitude');
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(GraffRequest::class);
        CRUD::field('nom');
        CRUD::field('description');
        CRUD::field('artiste');
        CRUD::field('adresse');
        $this->crud->addField([   // select_from_array
            'name'        => 'ville',
            'label'       => "ville",
            'type'        => 'select_from_array',
            'options'     => [
                'Saint-Denis' => 'Saint-Denis',
                'Saint-Pierre' => 'Saint-Pierre',
                'Saint-Paul' => 'Saint-Paul',
                'Le Port' => 'Le Port',
                'La Saline' => 'La Saline',
                'Saint-Joseph' => 'Saint-Joseph',
                'Saint-Louis' => 'Saint-Louis',
                'Saint-Benoît' => 'Saint-Benoît',
                'Sainte-Suzanne' => 'Sainte-Suzanne',
                'Saint-André' => 'Saint-André',
                'Saint-Gilles' => 'Saint-Gilles',
                'Saint-Leu' => 'Saint-Leu',
                'Le Tampon' => 'Le Tampon',
                'test' => 'test',
            ],

            'allows_null' => false,
            'default'     => 'one',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);
        $this->crud->addField([   // select_from_array
            'name'        => 'region',
            'label'       => "region",
            'type'        => 'select_from_array',
            'options'     => [
                'Nord' => 'Nord',
                'Sud' => 'Sud',
                'Est' => 'Est',
                'Ouest' => 'Ouest',
            ],

            'allows_null' => false,
            'default'     => 'one',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);
        CRUD::field('image');
        CRUD::field('latitude');
        CRUD::field('longitude');

        CRUD::addField([ // Photo
            'name'      => 'image',
            'label'     => 'Image',
            'type'      => 'upload',
            'prefix' => 'storage/',
            'upload'    => true,
            'temporary' => 10,
        ]);
        CRUD::field('image')->on('saving', function ($entry) {
            $this->getExif($entry);
            $this->createThumbnail($entry);
        });
    }

    public function getExif($entry)
    {
        $file = public_path('storage/' . $entry->image);
        $exif = exif_read_data($file, 'IFD0', 0);

        if (isset($exif['GPSLongitude'])) {
            function getGps($exifCoord, $hemi)
            {
                $degrees = count($exifCoord) > 0 ? gps2Num($exifCoord[0]) : 0;
                $minutes = count($exifCoord) > 1 ? gps2Num($exifCoord[1]) : 0;
                $seconds = count($exifCoord) > 2 ? gps2Num($exifCoord[2]) : 0;
                $flip = ($hemi == 'W' or $hemi == 'S') ? -1 : 1;
                return $flip * ($degrees + $minutes / 60 + $seconds / 3600);
            }
            function gps2Num($coordPart)
            {
                $parts = explode('/', $coordPart);
                if (count($parts) <= 0) return 0;
                if (count($parts) == 1) return $parts[0];
                return floatval($parts[0]) / floatval($parts[1]);
            }

            $long = getGps($exif["GPSLongitude"], $exif['GPSLongitudeRef']);
            $lat = getGps($exif["GPSLatitude"], $exif['GPSLatitudeRef']);
        } else {
            $lat = -20;
            $long = 55;
        }
        $entry->latitude = $lat;
        $entry->longitude = $long;
    }

public function createThumbnail($entry)
    {
        $file = public_path('storage/' . $entry->image);
        $desired_width = 200;
        $dest = public_path('/storage/miniatures/uploads/' . basename($entry->image));
        $source_image = imagecreatefromjpeg($file);
        $width = imagesx($source_image);
        $height = imagesy($source_image);
        $desired_height = floor($height * ($desired_width / $width));
        $temp_image = imagecreatetruecolor($desired_width, $desired_height);
        imagecopyresampled($temp_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
        imagejpeg($temp_image, $dest);
    }
    




    

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        CRUD::setValidation(GraffRequest::class);
        CRUD::field('nom');
        CRUD::field('description');
        CRUD::field('artiste');
        CRUD::field('adresse');
        $this->crud->addField([   // select_from_array
            'name'        => 'ville',
            'label'       => "ville",
            'type'        => 'select_from_array',
            'options'     => [
                'Saint-Denis' => 'Saint-Denis',
                'Saint-Pierre' => 'Saint-Pierre',
                'Saint-Paul' => 'Saint-Paul',
                'Le Port' => 'Le Port',
                'La Saline' => 'La Saline',
                'Saint-Joseph' => 'Saint-Joseph',
                'Saint-Louis' => 'Saint-Louis',
                'Saint-Benoît' => 'Saint-Benoît',
                'Sainte-Suzanne' => 'Sainte-Suzanne',
                'Saint-André' => 'Saint-André',
                'Saint-Gilles' => 'Saint-Gilles',
                'Saint-Leu' => 'Saint-Leu',
                'Le Tampon' => 'Le Tampon',
                'test' => 'test',
            ],

            'allows_null' => false,
            'default'     => 'one',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);
        $this->crud->addField([   // select_from_array
            'name'        => 'region',
            'label'       => "region",
            'type'        => 'select_from_array',
            'options'     => [
                'Nord' => 'Nord',
                'Sud' => 'Sud',
                'Est' => 'Est',
                'Ouest' => 'Ouest',
            ],

            'allows_null' => false,
            'default'     => 'one',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);
        CRUD::field('image');
        CRUD::field('latitude');
        CRUD::field('longitude');

        CRUD::addField([ // Photo
            'name'      => 'image',
            'label'     => 'Image',
            'type'      => 'upload',
            'prefix' => 'storage/',
            'upload'    => true,
            'temporary' => 10,
        ]);
        CRUD::field('image')->on('saving', function ($entry) {
           
            $this->createThumbnail($entry);
        });
    }
}
