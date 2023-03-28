<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\usuarios;
use Illuminate\Http\Request;
use Session;

class UsuariosController extends Controller
{
 
public function principal(){

 
 

 $sessiontipo = session('sessiontipo');

 if($sessiontipo=="User"){

    return view('bosstrap');
}
elseif ($sessiontipo=="Admin") {
    return redirect()->route('reporteempleados');

}
else{
    Session::flash('mensaje',"Inicia session para continuar");
    return redirect()->route('login');
};

}


    public function index()
    {
    return view ('login.login');
    }

    public function validar(Request $request)
    {
        
        $this->validate($request,[
            'usuario' =>'required',
            'pasw' =>'required',
                    ]);

        //  $passwordEncriptado = Hash::make($request->pasw);
        //             return $passwordEncriptado;          


$consulta = usuarios::where('user',$request->usuario)
->where('activo','si')
->get();

$cuantos=count($consulta);

if($cuantos==1 and hash::check($request->pasw,$consulta[0]->pasw))
{
    Session::put('sessionusuario',$consulta[0]->nombre." ". $consulta[0]->apellido);
    Session::put('sessiontipo',$consulta[0]->tipo);
    Session::put('sessionidu',$consulta[0]->idu);
    return redirect()->route("principal");
}
else{
 

    Session::flash('mensaje',"El Usuario o password no son validos");
    return redirect()->route('login');
};




    }

    public function store(Request $request)
    {
        
    }

    public function show(usuarios $usuarios)
    {
        
    }

    public function edit(usuarios $usuarios)
    {
    }
    public function update(Request $request, usuarios $usuarios)
    {
    
    }

    public function destroy(usuarios $usuarios)
    {
        
    }
}
