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
    //    dd($request);
        $this->validate($request, [ 'message' => 'bail|required' ]);
        if ($request->session()->exists('mail')) {
            return back()->with('already_send', 'ok');
        }
        #3. Envoi du mail
        Mail::to($usermail->value)->queue(new MyMail($request->all()));
        $request->session()->put('mail', '1');
        return back()->with('Mail_envoyé', 'ok');
    }
}
