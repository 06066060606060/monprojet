<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Mail\MyMail;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendMessageGoogle (Request $request) {
        $usermail = Settings::All()->first();
        #1. Validation de la requête
        $this->validate($request, [ 'message' => 'bail|required' ]);
        #3. Envoi du mail
        Mail::to($usermail->value)->queue(new MyMail($request->all()));

        return back()->with('Message_envoyé', 'ok');
    }
}
