<?php

namespace App\Http\Controllers;

use App\Models\Graph;
use Illuminate\Http\Request;

class GraphController extends Controller
{

public function index()
{
    return Graph::all();
}

}
