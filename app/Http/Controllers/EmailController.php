<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller
{
    public function send(Request $request) {
        $title = $request->input('title');
        $content = $request->input('content');

        Mail::send('emails.send', [
            'title' => $title,
            'content' => $content
        ], function($message){
            $message->from('me@gmail.com', 'Ixxra');
            $message->to('rene.garcia@correo.uady.mx');
        });

        return response()->json(['message' => 'Request completed']);
    }
}
