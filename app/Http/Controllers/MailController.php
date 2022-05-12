<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;



use Illuminate\Http\Request;

class MailController extends Controller
{
    public function basic_email() {
//        dd(7);
        $data = array('name'=>"Arslan");
        $details = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];
        Mail::send(['text'=>'mail'], $data, function($message) {
            $message->to('laravelgalaxy@gmail.com', 'faisal is sendiing u mail')->subject
            ('Are You Getting Mail');
            $message->from('faisalhussainntu03@gmail.com','FaisalHussain');
        });

        echo "Basic Email Sent. Check your inbox.";
    }
}
