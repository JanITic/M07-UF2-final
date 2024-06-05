<?php

use App\Http\Controllers\PrimerControlador;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EscolaControlador;
use App\Http\Controllers\UsuariControlador;
use App\Http\Controllers\ProfeControlador;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar las rutas web para tu aplicación. Estas
| rutas son cargadas por el RouteServiceProvider y todas ellas serán
| asignadas al grupo de middleware "web". ¡Haz algo genial!
|
*/

// Ruta principal que retorna la vista 'login'
Route::get('/', function () {
    return view('login');
});

// Ruta POST para /login que utiliza la función login de EscolaControlador y pasa por el middleware CheckEmail
Route::post('/login', [EscolaControlador::class, 'login'])->middleware('email')->name('comprovaCorreu.index');

// Ruta que muestra un mensaje de éxito y un enlace para iniciar sesión
Route::get('/hurra', function () {
    return "<h1>Usuari creat!</h1><br><a href='signin'>Iniciar sessió</a>";
})->name('totBe.index');

// Rutas con prefijo 'sign' agrupadas
Route::prefix('sign')->group(function () {
    // Ruta para 'signin' con parámetros, utilizando la función vista1 de PrimerControlador
    Route::get('/signin/{p1}/{p2}/{p3}/{p4}', [PrimerControlador::class, 'vista1']);
    // Ruta para 'signup' con parámetros, utilizando la función vista2 de PrimerControlador
    Route::get('/signup/{p1}/{p2}/{p3}', [PrimerControlador::class, 'vista2']);
});

/************* PRÀCTICA 3 *************/
// Ruta para 'signin' que utiliza la función signin de EscolaControlador
Route::get('/signin',  [EscolaControlador::class, 'signin']);

// Ruta para mostrar el formulario de creación de usuario
Route::get('/crearUsuari', function () {
    return view('crearUsuari');
});

// Ruta para la vista del profesor
Route::get('/professor', function () {
    return view('professor');
});

/************* PRÀCTICA 4 *************/
// Rutas agrupadas para UsuariControlador
Route::controller(UsuariControlador::class)->group(function () {
    // Ruta para mostrar el formulario de creación de usuario
    Route::get('/crearUsuari', 'mostrarCrearUsuari');
    // Ruta POST para crear un nuevo usuario
    Route::post('/crearUsuari', 'crearUsuari')->name('crearUsuari');
    // Ruta POST para el inicio de sesión
    Route::post('/signin', 'login');
});

/************* PRÀCTICA 5 *************/
// Rutas agrupadas para ProfeControlador
Route::controller(ProfeControlador::class)->group(function () {
    // Ruta para listar los profesores
    Route::get('/prof', 'index')->name('prof.index');
    // Ruta para mostrar el formulario de edición de profesor
    Route::get('/prof/edit/{id}', 'edit')->name('prof.edit');
    // Ruta para mostrar el formulario de creación de profesor
    Route::get('/prof/crear', 'crear')->name('prof.crear');
    // Ruta POST para guardar un nuevo profesor
    Route::post('/prof', 'guardar')->name('prof.guardar');
    // Ruta PUT para modificar un profesor existente
    Route::put('/prof/edit/{id}', 'modificar')->name('prof.modificar');
    // Ruta DELETE para borrar un profesor
    Route::delete('/prof/delete/{id}', 'borrar')->name('prof.borrar');
    // Ruta POST para subir un archivo relacionado con un profesor
    Route::post('/prof/pujar', 'pujar')->name('prof.pujar');
});
