<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\empleadosController;
use App\Http\Controllers\DepartamentosController;
use App\Http\Controllers\UsuariosController;
Route::get('empleado/{nombre}/{dias}', [empleadosController::class,'index']);


Route::get('pago', [empleadosController::class,'pago']);
Route::get('nomina/{dias}/{pago}', [empleadosController::class,'nomina']);

Route::get('/', [empleadosController::class,'salir'])->name('salir');

Route::get('boos', [empleadosController::class,'boos'])->name('boos');

Route::get('header', [empleadosController::class,'header'])->name('header');

Route::get('scrips', [empleadosController::class,'scrips'])->name('scrips');


                // Altas
Route::get('AltaEmpleado', [empleadosController::class,'AltaEmpleado'])->name('AltaEmpleado');

Route::post('GuardarEmpleado', [empleadosController::class,'GuardarEmpleado'])->name('GuardarEmpleado');



            //    consulta a base de datos 

Route::get('eloquent', [empleadosController::class,'eloquent'])->name('eloquent');
Route::get('consulta', [empleadosController::class,'consulta'])->name('consulta');


        //    insertar base de datos 
Route::get('insertar', [DepartamentosController::class,'insertar'])->name('insertar');


        // Modificar base de datos
Route::get('editar', [DepartamentosController::class,'editar'])->name('editar');


       // Eliminacion de datos 

Route::get('eliminar',[DepartamentosController::class,'eliminar'])->name('eliminar');

Route::get('reporteempleados',[empleadosController::class,'reporteempleados'])->name('reporteempleados');

Route::get('desactivaempleado/{ide}',[empleadosController::class,'desactivaempleado'])->name('desactivaempleado');

Route::get('activaempleado/{ide}',[empleadosController::class,'activaempleado'])->name('activaempleado');

Route::get('borrarempleado/{ide}',[empleadosController::class,'borrarempleado'])->name('borrarempleado');


// modificar 

Route::get('ModificaEmpleado/{ide}', [empleadosController::class,'ModificaEmpleado'])->name('ModificaEmpleado');

Route::post('guardarmodificacion', [empleadosController::class,'guardarmodificacion'])->name('guardarmodificacion');

Route::get('estados', [empleadosController::class,'estados'])->name('estados');


        //      login

Route::get('login',[UsuariosController::class,'index'])->name('login');


Route::post('validar',[UsuariosController::class,'validar'])->name('validar');
Route::get('principal',[UsuariosController::class,'principal'])->name('principal');