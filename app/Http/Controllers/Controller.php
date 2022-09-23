<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Graff;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function about()
    {   
        $user = User::All();
        $user = $user[0];
        $about = Settings::All();
        return view('about', compact('about','user'));
    }
}
