<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request) /* Request $request receives the submitted form data.*/


    {
        $validated = $request->validate([ /* $request->validate(...) checks that all required fields are filled correctly and automatically redirects back with errors if something is wrong.*/
            'prenom'  => 'required|string|max:100',
            'nom'     => 'required|string|max:100',
            'email'   => 'required|email|max:255',
            'sujet'   => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        return back()->with('success', 'Message envoyé avec succès.'); /*If validation passes, the method returns back with a success message for now.*/
    }
}