<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'description' => 'required',
        ]);
        try{
            Mail::send('emails.contact', $data, function($message) use ($data) {
                $message->to('abdel@gmail.com', 'Destinataire')->subject('Nouveau message de contact');
            });
           return redirect('/');
        }
        catch(Exception $e){
            return 'Erreur lors de l\'envoi de l\'email: ' . $e->getMessage();
        };

    }
}
