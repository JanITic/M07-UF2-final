<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuari;
use Illuminate\Support\Facades\Auth;

class UsuariControlador extends Controller
{
    // Función para consultar todos los usuarios
    function consultaUsuaris()
    {
        // Obtiene todos los usuarios de la base de datos
        $usuaris = Usuari::all();

        // Retorna la vista 'login' con la lista de usuarios
        return view('login')->with('usuaris', $usuaris);
    }

    // Función para mostrar el formulario de creación de usuario
    function mostrarCrearUsuari()
    {
        // Retorna la vista 'crearUsuari' para agregar un nuevo usuario
        return view('crearUsuari');
    }

    // Función para crear un nuevo usuario
    function crearUsuari()
    {
        // Crea una nueva instancia de Usuari
        $usuari = new Usuari();

        // Asigna los valores desde el request
        $usuari->nom = request('nom');
        $usuari->cognoms = request('cognoms');
        $usuari->password = request('password');
        $usuari->email = request('email');
        $usuari->rol = request('rol');
        $usuari->actiu = request('actiu');

        // Guarda el nuevo usuario en la base de datos
        $usuari->save();

        // Redirige a la ruta 'totBe.index'
        return to_route('totBe.index');
    }

    // Función para manejar el inicio de sesión
    function login()
    {
        // Obtiene el email y la contraseña desde el request
        $email = request('email');
        $password = request('password');

        // Encuentra al usuario por su email
        $usuario = Usuari::where('email', $email)->first();

        // Verifica si el usuario existe y la contraseña es correcta
        if ($usuario && $usuario->password === $password) {
            // Dependiendo del rol del usuario, retorna una vista diferente
            switch ($usuario->rol) {
                case ('Alumne'):
                    // Retorna la vista 'escola.alumne' con el email del usuario
                    return view('escola.alumne')->with('email', $email);
                    break;
                case ('Professor'):
                    // Obtiene la lista de alumnos y retorna la vista 'escola.professor' con la lista de alumnos
                    $llistaAlum = Usuari::where('rol', 'Alumne')->get();
                    return view('escola.professor')->with('llistaAlumnes', $llistaAlum);
                    break;
                case ('Centre'):
                    // Obtiene la lista de profesores y alumnos, y retorna la vista 'escola.centre' con ambas listas
                    $llistaProfessors = Usuari::where('rol', 'Professor')->get();
                    $llistaAlum = Usuari::where('rol', 'Alumne')->get();
                    return view('escola.centre')->with('llistaAlumnes', $llistaAlum)->with('llistaProfessors', $llistaProfessors);
                    break;
            }
        } else {
            // Si el usuario no existe o la contraseña es incorrecta, retorna la vista 'error'
            return view('error');
        }
    }
}
