<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Graff;
use Illuminate\Http\Request;

class GraffsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $graffs = Graff::all();
        return response()->json($graffs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Graffs  $graffs
     * @return \Illuminate\Http\Response
     */
    public function show(Graff $graffs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Graffs  $graffs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Graff $graffs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Graffs  $graffs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Graff $graffs)
    {
        //
    }
}
