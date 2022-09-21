<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Mail\MyMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendMessageGoogle (Request $request) {
        $user = User::find(1);
        #1. Validation de la requête
        $this->validate($request, [ 'message' => 'bail|required' ]);
        #3. Envoi du mail
        Mail::to($user->email)->queue(new MyMail($request->all()));

        return back()->withText("Message envoyé");
    }
}
