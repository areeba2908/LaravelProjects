<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function mailForm(){
        return view('mail.mailForm');
    }

    public function sendMail(Request $request){
            $details = [
                'title' => $request['title'],
                'body' =>  $request['messagebody']
            ];
           
            \Mail::to($request['senderemail'])->send(new \App\Mail\MyTestMail($details));
           
            session()->flash('success', 'Message successfully Sent.');
            return redirect('/home');
    }
    
}
