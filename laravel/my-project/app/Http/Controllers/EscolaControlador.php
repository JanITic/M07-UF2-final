<?php

namespace App\Http\Controllers;

use Hamcrest\Text\SubstringMatcher;
use Illuminate\Http\Request;

class EscolaControlador extends Controller
{
    // Funció login que rep la petició del web.php
    function login()
    {
        // Demanem el correu i la contrasenya amb el mètode POST i el request
        $email = Request('email');
        $password = Request('password');

        // Guardem en un array els diferents correus amb els que mostrarem les diferents vistes
        $array = ["@profe.cat", "@alumne.cat", "@admin.cat"];

        // Si el correu conté el primer element de l'array (@profe.cat) vol dir que l'usuari és 
        // professor per tant mostrarem la vista "professor". El mateix amb els altres if
        if (str_contains($email, $array[0])) {
            return view('escola.professor');
        } else if (str_contains($email, $array[1])) {
            return view('escola.alumne')->with('email', $email);
        } else if (str_contains($email, $array[2])) {
            return view('escola.centre');
        } else {
            return view("error");
        }
    }

    function signin()
    {
        return view('login');
    }
}
