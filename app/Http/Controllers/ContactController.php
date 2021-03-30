<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function contact(Request $request) {
        $subject = "Nuevo contacto";
        
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'body' => $request->body,
        );

 

        Mail::send('emails.contact',$data, function($msj) use($subject,$data){
            $msj->from(ENV('MAIL_USERNAME'), 'Integralidad GAMMA');
            $msj->subject($subject);
            $msj->to('marc0.4ntonio.1996@gmail.com');
        });

        return redirect()->back()->with('success', 'Integralidad GAMMA se pondra en contacto contigo');
    }
}
