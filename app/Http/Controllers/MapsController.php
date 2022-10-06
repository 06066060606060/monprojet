<?php

namespace App\Http\Controllers;

use App\Models\Graff;
use App\Models\Regions;
use Illuminate\Http\Request;

class MapsController extends Controller
{
    public function getMaps()
    {
    
       
            $graffs = Graff::orderBy('id', 'desc')->get();
            $graffN = Graff::where('region', 'nord')->orderBy('id', 'desc')->get();
            $graffS = Graff::where('region', 'sud')->orderBy('id', 'desc')->get();
            $graffE = Graff::where('region', 'est')->orderBy('id', 'desc')->get();
            $graffO = Graff::where('region', 'ouest')->orderBy('id', 'desc')->get();
            $region_map = Regions::all();
        return view('maps', compact('graffs', 'region_map','graffN', 'graffS', 'graffE', 'graffO'));
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
