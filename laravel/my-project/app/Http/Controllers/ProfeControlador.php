<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuari;
use Illuminate\Support\Facades\Storage;

class ProfeControlador extends Controller
{
    // Función para mostrar todos los profesores
    function index()
    {
        // Obtiene todos los usuarios con el rol 'Professor'
        $llistaProfessors = Usuari::where('rol', 'Professor')->get();
        
        // Retorna la vista 'escola.centre' con la lista de profesores
        return view('escola.centre')->with('llistaProfessors', $llistaProfessors);
    }

    // Función para mostrar el formulario de creación de profesor
    function crear()
    {
        // Retorna la vista 'professor.add' para agregar un nuevo profesor
        return view('professor.add');
    }

    // Función para mostrar el formulario de edición de un profesor específico
    function edit($id)
    {
        // Encuentra al profesor por su ID
        $profe = Usuari::find($id);

        // Retorna la vista 'professor.editar' con los datos del profesor
        return view('professor.editar')->with('prof', $profe);
    }

    // Función para guardar un nuevo profesor
    function guardar(Request $request)
    {
        // Crea una nueva instancia de Usuari
        $usuari = new Usuari();

        // Asigna el nombre del profesor desde el request
        $usuari->nom = $request->nom;

        // Guarda el nuevo usuario en la base de datos
        $usuari->save();

        // Obtiene la lista actualizada de profesores
        $llistaProf = Usuari::where('rol', 'Professor')->get();

        // Retorna la vista 'escola.centre' con la lista actualizada de profesores
        return view('escola.centre')->with('llistaProfessors', $llistaProf);
    }

    // Función para modificar los datos de un profesor existente
    function modificar($id)
    {
        // Encuentra al usuario por su ID
        $usuari = Usuari::find($id);

        // Asigna los nuevos valores desde el request
        $usuari->nom = request('nom');
        $usuari->cognoms = request('cognoms');
        $usuari->password = request('password');
        $usuari->email = request('email');
        $usuari->rol = request('rol');
        $usuari->actiu = request('actiu');

        // Guarda los cambios en la base de datos
        $usuari->save();

        // Dependiendo del rol del usuario, retorna una vista diferente
        if ($usuari->rol == "Alumne") {
            return view('escola.alumne');
        } elseif ($usuari->rol == "Professor") {
            $llistaAlum = Usuari::where('rol', 'Alumne')->get();
            return view('escola.professor')->with('llistaAlumnes', $llistaAlum);
        } elseif ($usuari->rol == "Centre") {
            $llistaProf = Usuari::where('rol', 'Professor')->get();
            $llistaAlum = Usuari::where('rol', 'Alumne')->get();
            return view('escola.centre')->with('llistaProfessors', $llistaProf)->with('llistaAlumnes', $llistaAlum);
        }
    }

    // Función para borrar un usuario
    function borrar($id)
    {
        // Encuentra al usuario por su ID
        $usuari = Usuari::find($id);

        // Elimina al usuario de la base de datos
        $usuari->delete();

        // Dependiendo del rol del usuario eliminado, retorna una vista diferente
        if ($usuari->rol === "Professor") {
            $llistaProf = Usuari::where('rol', 'Professor')->get();
            $llistaAlum = Usuari::where('rol', 'Alumne')->get();
            return view('escola.centre')->with('llistaProfessors', $llistaProf)->with('llistaAlumnes', $llistaAlum);
        } elseif ($usuari->rol === "Alumne") {
            $llistaAlum = Usuari::where('rol', 'Alumne')->get();
            return view('escola.professor')->with('llistaAlumnes', $llistaAlum);
        } else {
            // Redirige de vuelta con un mensaje de error si el rol no es válido
            return redirect()->back()->with('error', 'Rol no válido');
        }
    }

    // Función para subir un archivo
    function pujar(Request $request) {
        // Validar que el archivo sea de tipo imagen y no mayor a 10MB
        $request->validate([
            'document' => 'required|mimes:jpg,png,jpeg|max:10240', // Ajusta las extensiones y el tamaño según tus necesidades
        ]);

        // Obtiene el archivo del request
        $fitxer = $request->file('document');
        
        // Almacena el archivo en la carpeta 'documents/alumnes' dentro del almacenamiento público
        $ruta = $fitxer->store('documents/alumnes', 'public'); 

        // Obtiene la URL pública del archivo almacenado
        $url = Storage::url($ruta);
        
        // Retorna la vista 'escola.alumne' con la URL del archivo
        return view('escola.alumne')->with('fitxer', $url);
    }
}
