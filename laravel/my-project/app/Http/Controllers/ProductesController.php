<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductesController extends Controller
{
    // array dels productes que tenim
    private $nom_productes = [
        "Laptop",
        "Monitor",
        "Teclat",
        "Mouse",
        "Impresora",
        "Tarjeta gràfica",
        "Auriculars"
    ];

    // funcio per fer consulta en el array per si el producte esta
    public function consulta(Request $request)
    {
        $product_name = $request->input('product_name');
        // si esta et redirecciona a productes.trobat
        if (in_array($product_name, $this->nom_productes)) { // tot agafant el nom de product
            return redirect()->route('productes.trobat', ['product_name' => $product_name]);
        } else { // si no esta et redirecciona a productes.notrobat
            $this->nom_productes[] = $product_name;
            return redirect()->route('productes.notrobat', ['product_name' => $product_name]);
        }
    }

    // si el producte esta t'envia a la view trobat y envia el product_name
    public function trobat($product_name)
    {
        return view('trobat', ['product_name' => $product_name]);
    }

    // si el producte no esta t'envia a la view notrobat y envia el product_name
    public function notrobat($product_name)
    {
        $product_list = $this->nom_productes;
        return view('notrobat', ['product_name' => $product_name, 'product_list' => $product_list]);
    }
}
