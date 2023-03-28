<?php

namespace App\Http\Controllers;

use App\Models\departamentos;
use Illuminate\Http\Request;
class DepartamentosController extends Controller
{
    public function consultas(){

        // consulta a todos los elementos de base de datos
        // $consulta= departamentos::all();

        // consulta a todos los elementos de la base de datos incluyendo a los eliminados
        // $consulta= departamentos::whithTrashed()->get();


        // solo los eliminados 
        // $consulta= departamentos::onlyTrashed()->get();

        // usando where
        // $consulta= departamentos::onlyTrashed()
        // ->where('nombre','negocio')
        // ->get();


        // // Restaura un registro que se encuentre eliminado 
        // departamentos::whitTrashed()->where('ide',1)->restore();

        // elimina completamente de la base de datos
        // $departamentos=departamentos::find(1)->forceDelete();


// utiliznado where
$consulta=departamentos::where('idd','1')->get();


        return $consulta;

    }



    public function insertar()
    {

        // manera 1

        // $departamentos= new departamentos;
        // $departamentos->idd=2;
        // $departamentos->nombre="negocios";
        // $departamentos->save();

        //manera 2

        $departamentos= departamentos::create([
            'idd'=>3, 'nombre'=>"departamento"
        ]);

return "operacion realizada";

    }

    public function editar()
    {

        // manera 1

        // $departamentos= departamentos::find(1); //El find busca el numero de registro
        // $departamentos-> nombre ="venta";
        // $departamentos->save();

        // manera 2 para varios campos usando where

        departamentos::where('nombre','negocios') // where esta realiando la condicion para el cambio
        ->update(['nombre'=>'negocio']);


return "Modificacion realizada";

    }
    
    public function eliminar()
    {
//    manera 1
// departamentos::destroy(3);

// manera 2
// $departamentos= departamentos::find(3);
// $departamentos->delete();


// manera 3 where
$departamentos = departamentos::where('nombre','negocios')
->delete();

return "Eliminacion realizada";

    }

}
