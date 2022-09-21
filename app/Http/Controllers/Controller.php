<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Graff;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

public function nord()
{
    $graffs = Graff::orderBy('id', 'desc')->get();
    return view('nord', compact('graffs'));
}

public function sud()
{
    $graffs = Graff::orderBy('id', 'desc')->get();
    return view('sud', compact('graffs'));
}

public function est()
{
    $graffs = Graff::orderBy('id', 'desc')->get();
    return view('est', compact('graffs'));
}

public function ouest()
{
    $graffs = Graff::orderBy('id', 'desc')->get();
    return view('ouest', compact('graffs'));
}

public function proxi(){
    $graffs = Graff::orderBy('id', 'desc')->get();
   
    return view('proxi', compact('graffs'));
}

public function details($id)
{
    $graff = Graff::find($id);
    return view('details', compact('graff'));
}

public function about()
{
    $about = About::all();
    return view('about', compact('about'));
}

}
