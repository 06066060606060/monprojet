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
        CRUD::column('addresse');
        CRUD::column('region');
        CRUD::column('ville');
        CRUD::column('image');
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
        CRUD::field('addresse');
        CRUD::field('region');
        CRUD::field('ville');
        CRUD::field('image');
        CRUD::field('latitude');
        CRUD::field('longitude');
        CRUD::addField([ // Photo
            'name'      => 'image',
            'label'     => 'Image',
            'type'      => 'upload',
            'upload'    => true,
            'temporary' => 10,
        ]);
        CRUD::field('image')->on('saving', function ($entry) {
            $file = public_path('storage/' . $entry->image);
            $exif = exif_read_data($file, 'IFD0', 0);
            if ($exif && isset($exif['GPSLongitude'])) {
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
    
            } 
          else {
            $lat = 0;
            $long = 0;
          }

            $entry->latitude = $lat;
            $entry->longitude = $long;
        });
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
