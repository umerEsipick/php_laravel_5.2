<?php

namespace App\Http\Controllers;

use Mail;
use redirect;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendEmailReminder($id = null)
    {
        $user = User::findOrFail($id);
 
        Mail::send('auth.send_email', ['email' => base64_encode($user->email)], function ($m) use ($user) {
            $m->from('umerf6455@gmail.com', 'PHP test');
 
            $m->to($user->email, $user->name)->subject('Your Reminder!');
        });
    }

    public function getConfirm($email = null)
    {
        if(! $email)
        {
            return redirect('login');
        }

        $user = User::whereEmail(base64_decode($email))->first();
        if(! $user)
        {
            return redirect('login');
        }

        $user->confirmed = 1;
        $user->save();
        return redirect('login');
    }
}
