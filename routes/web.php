<?php

use Illuminate\Support\Facades\Route;
//Importamos el controlador
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CifradoCesarController;
use Illuminate\Support\Facades\View;
//==========================================================================
//Definimos las rutas
      //ruta principal
 Route::get('/',[HomeController::class,'index'])->name('home');

   //Creamos componente para los controlaores
   Route::get('/componentes/{componente}', function($componente) {
    if (View::exists("components.cifrado-$componente")) {
        return view("components.cifrado-$componente");
    } else {
        // Redirigir al inicio o a una página específica
        return view('components.error');
    }
});

//Routa Para cesar
Route::post('/cifrar', [CifradoCesarController::class, 'cifrar']);
Route::post('/descifrar', [CifradoCesarController::class, 'descifrar']);
