<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function register()
    {
        return view('form');
    }

    public function signup(Request $request) 
    {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $gender = $request->input('gender');
        $nationality = $request->input('nationality');
        $language = $request->input('language');

        return view("welcome", ['firstname' => $firstname, 'lastname' => $lastname, 'gender' => $gender, 
        'nationality' => $nationality, 'language' => $language]);
    }
}
