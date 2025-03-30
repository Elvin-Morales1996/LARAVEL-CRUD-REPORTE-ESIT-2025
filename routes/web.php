<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;


Route::get('/', [ProyectoController::class, 'index'])->name('proyectos.index');
//segundo paso de crear un nuevo proyecto es poner la ruta

Route::controller(ProyectoController::class)->group(function(){ 
Route::get('proyectos/crear','create')->name('proyectos.crear');
});


Route::post('proyectos', [ProyectoController::class, 'store'])->name('proyectos.store');
Route::get('/proyectos/{proyecto}/edit', [ProyectoController::class, 'edit'])->name('proyectos.edit');
Route::put('/proyectos/{proyecto}', [ProyectoController::class, 'update'])->name('proyectos.update');
Route::delete('/proyectos/{proyecto}', [ProyectoController::class, 'destroy'])->name('proyectos.destroy');




/*
/proyectos/pdf:  yo estoy creando esta ruta que cuando navegamos poner esa ruta.
[ProyectoController::class, 'GenerarPDF']: el controlado que donde estan la funcion CRUD,
'GenerarPDF': que es el nombre de la funcion que debe buscarlo en el controlador.
->name('proyectos.pdf'): es el nombre de la ruta puedo ponerle el nombre que quiera siempre y
cuando sea unica ese nombre
*/
Route::get('/proyectos/pdf', [ProyectoController::class, 'GenerarPDF'])->name('proyectos.pdf');









