<?php

namespace App\Http\Controllers;

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
    $graffs = Graff::all();
    return view('nord', compact('graffs'));
}

public function sud()
{
    $graffs = Graff::all();
    return view('sud', compact('graffs'));
}

public function est()
{
    $graffs = Graff::all();
    return view('est', compact('graffs'));
}

public function ouest()
{
    $graffs = Graff::all();
    return view('ouest', compact('graffs'));
}

public function proxi(){
    $graffs = Graff::all();
   
    return view('proxi', compact('graffs'));
}




}
