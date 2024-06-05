<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrimerControlador extends Controller
{
    function vista1($p1, $p2, $p3, $p4)
    {
        $vista = $p1 . " " . $p2 . " " . $p3 . " " . $p4;
        return view('signin')->with('a', $vista);
    }

    function vista2($p1, $p2, $p3)
    {
        $vista2 = $p1 . " " . $p2 . " " . $p3;
        return view('signup')->with('b', $vista2);
    }
}
