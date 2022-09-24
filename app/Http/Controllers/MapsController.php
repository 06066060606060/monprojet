<?php

namespace App\Http\Controllers;

use App\Models\Graff;
use App\Models\Regions;
use Illuminate\Http\Request;

class MapsController extends Controller
{
    public function getMaps($region)
    {
    
        if ($region == 'nord') {
            $graffs = Graff::where('region', 'nord')->orderBy('id', 'desc')->get();
            $region_map = Regions::where('region', 'nord')->get();
     
        }
        if ($region == 'sud') {
            $graffs = Graff::where('region', 'sud')->orderBy('id', 'desc')->get();
            $region_map = Regions::where('region', 'sud')->get();
        }
        if ($region == 'est') {
            $graffs = Graff::where('region', 'est')->orderBy('id', 'desc')->get();
            $region_map = Regions::where('region', 'est')->get();

        }
       if ($region == 'ouest') {
            $graffs = Graff::where('region', 'ouest')->orderBy('id', 'desc')->get();
            $region_map = Regions::where('region', 'ouest')->get();
        }
        if ($region == 'full') {
            $graffs = Graff::orderBy('id', 'desc')->get();
            $region_map = Regions::all();
        }
        
    
        return view('maps', compact('graffs', 'region', 'region_map'));
    }
    
    static public function getFullMaps(){
        $graffs = Graff::All();
        return (compact('graffs'));
    }

    static function Dashboard()
    {
        $graffN = Graff::where('region', 'nord')->get();
        $graffS = Graff::where('region', 'sud')->get();
        $graffE = Graff::where('region', 'est')->get();
        $graffO = Graff::where('region', 'ouest')->get();
      return (compact('graffN', 'graffS', 'graffE', 'graffO'));
    }
    
    public function details($id)
    {
        $graff = Graff::find($id);
        return view('details', compact('graff'));
    }
    
}
