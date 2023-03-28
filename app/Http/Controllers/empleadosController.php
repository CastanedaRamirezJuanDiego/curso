<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\empleados;
use App\Models\nominas;
use App\Models\departamentos;
use App\Models\estados;
use Session;

class empleadosController extends Controller
{

    public function activaempleado($ide){
        empleados::withTrashed()->where('ide',$ide)->restore();
         /*return view('formulario.alerta')->with('proceso',"Activar Empleados")
              ->with('mensaje',"El empleado ha sido activado correctamente")
              ->with('error',1);*/


              Session::flash('mensaje',"El empleado ha sido activado correctamente");

              return redirect()->route('reporteempleados');
      
      }

public function desactivaempleado($ide){
  $empleados=empleados::find($ide);
  $empleados->delete();

  /* return view('formulario.alerta')->with('proceso',"Desactivar Empleados")
        ->with('mensaje',"El empleado ha sido desactivado correctamente")
        ->with('error',1);*/

        Session::flash('mensaje',"El empleado ha sido desactivado correctamente");

        return redirect()->route('reporteempleados');

}

public function borrarempleado($ide){

    $buscarempleado=nominas::where('ide',$ide)->get();
    $cuantos=count($buscarempleado);
    if($cuantos==0){
        $empleados=empleados::withTrashed()->find($ide)->forceDelete();
        /*return view ('formulario.alerta')
        ->with('proceso',"Borrar Empleado")
        ->with('mensaje',"El empleado a sido borrado correctamente del sistema")
        ->with('error',1);*/

        Session::flash('mensaje',"El empleado ha sido de borrado del sistema correctamente");

        return redirect()->route('reporteempleados');


    }else
    {     
        /*return view ('formulario.alerta')
        ->with('proceso',"Borrar Empleado")
        ->with('mensaje',"El empleado no se puede elmimnar del sistema ya que tiene resgistros en nomina")
        ->with('error',0);    */


        Session::flash('mensaje',"El empleado no se puede elmimnar del sistema ya que tiene resgistros en nomina");

        return redirect()->route('reporteempleados');

    };
}





public function reporteempleados (){
    
 $sessiontipo = session('sessiontipo');

 if($sessiontipo=="Admin"){


    $consulta=empleados::withTrashed()->join('departamentos','empleados.idd','=','departamentos.idd')
->select('empleados.ide','empleados.nombre','empleados.apellido','departamentos.nombre as depa','empleados.email'
,'empleados.deleted_at','empleados.img')
->orderBy('empleados.nombre')->get();


    return view ('reporteempleados')->with('consulta',$consulta)->with('sessiontipo',$sessiontipo);
}
else{
    Session::flash('mensaje',"Inicia session para continuar");
    return redirect()->route('login');
};
}




    public function AltaEmpleado()
    {
        $consulta =empleados::orderBy('ide','DESC')
        ->take(1)->get();
$cuantos=count ($consulta);

if($cuantos===0){
$idesigue=1;
}else{
$idesigue=$consulta[0]->ide+1;
};

$departamentos = departamentos::orderBy('nombre')->get();

return view ('formulario.AltaEmpleado')
->with('idesigue',$idesigue)
->with('departamentos',$departamentos);

    }


    public function GuardarEmpleado(Request $request)
    {
 

        $this->validate($request,[
'nombre' =>'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
'apellido' =>'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü,ñ]+$/',
'email' =>'required|email',
'celular' =>'required|numeric|integer|regex:/^[0-9]{10}$/',
'img' =>'image|mimes:gif,jpg,png,jpeg'
        ]);

        $file= $request->file('img');
        if($file<>""){
$img =$file->getClientOriginalName();
$img2=$request ->ide.$img;

\Storage::disk('local')->put($img2, \File::get($file));
        }else{
$img2="sinfoto.jpg";
        };




        $empleados= new empleados;
        $empleados->ide=$request->ide;
        $empleados->nombre=$request->nombre;
        $empleados->apellido=$request->apellido;
        $empleados->email=$request->email;
        $empleados->celular=$request->celular;
        $empleados->sexo=$request->sexo;
        $empleados->idd=$request->idd;
        $empleados->edad=$request->edad;
        $empleados->salario=$request->salario;
        $empleados->descripcion=$request->descripcion;
        $empleados->img= $img2;
        $empleados->save();


       /* return view('formulario.alerta')->with('proceso',"Alta de Empleados")
        ->with('mensaje',"El empleado $request->nombre $request->apellido ha sido de alta correctamente")
        ->with('error',1);*/



        Session::flash('mensaje',"El empleado $request->nombre $request->apellido ha sido de alta correctamente");

        return redirect()->route('reporteempleados');

    }





    
public function ModificaEmpleado ($ide){
    $consulta=empleados::withTrashed()->join('departamentos','empleados.idd','=','departamentos.idd')
    ->select('empleados.ide','empleados.nombre','empleados.apellido','empleados.email','empleados.celular'
    ,'empleados.edad','empleados.salario','empleados.sexo','empleados.descripcion'
    ,'departamentos.nombre as depa','empleados.idd','empleados.email','empleados.img')->where('ide',$ide)
    ->orderBy('empleados.nombre')->get();
    $departamentos=departamentos::all();
return view ('formulario.ModificaEmpleado')->with('consulta',$consulta[0])
->
with('departamentos',$departamentos);
}

public function guardarmodificacion (Request $request){
    
    $this->validate($request,[
        'nombre' =>'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
        'apellido' =>'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü,ñ]+$/',
        'email' =>'required|email',
        'celular' =>'required|numeric|integer|regex:/^[0-9]{10}$/',
        'img' =>'image|mimes:gif,jpg,png,jpeg'
                ]);


                $file= $request->file('img');
                if($file<>""){
        $img =$file->getClientOriginalName();
        $img2=$request ->ide.$img;
        
        \Storage::disk('local')->put($img2, \File::get($file));
                }
     
        
        
                $empleados= empleados::withTrashed()->find($request->ide);
                $empleados->ide=$request->ide;
                $empleados->nombre=$request->nombre;
                $empleados->apellido=$request->apellido;
                $empleados->email=$request->email;
                $empleados->celular=$request->celular;
                $empleados->sexo=$request->sexo;
                $empleados->idd=$request->idd;
                $empleados->edad=$request->edad;
                $empleados->salario=$request->salario;
                $empleados->descripcion=$request->descripcion;
                if($file<>""){
                $empleados->img= $img2;
                }
                $empleados->save();
        
        
                /*return view('formulario.alerta')->with('proceso',"Modifica Empleados")
                ->with('mensaje',"El empleado $request->nombre $request->apellido ha sido de actualizado correctamente")
                ->with('error',1);*/

                Session::flash('mensaje',"El empleado $request->nombre $request->apellido
                 ha sido de actualizado correctamente");

                 return redirect()->route('reporteempleados');


        
    }
    













public function consulta(){

// $consulta= empleados::all();

// $consulta=empleados::where('edad','>=','20')->get();

// $consulta =empleados::whereBetween('edad',[20,25])->get();


$consulta =empleados::whereIn('ide',[3,4,5])->
orderBy('nombre','desc')
->get();

$consulta=empleados::where('edad','>=','20')->take(2)->get();

$consulta=empleados::select(['nombre','apellido','edad'])->where('edad','>=',20)->get();

$consulta=empleados::select(['nombre','apellido','edad'])->where('nombre','LIKE','%a%')->get();

$consulta=empleados::where('sexo','M')->sum('salario');

$consulta=empleados::groupBy('sexo')
        ->selectRaw('sexo,sum(salario) as salariototal')
        ->get();

        $consulta=empleados::groupBy('sexo')
        ->selectRaw('sexo,count(*) as numero')
        ->get();




$consulta=empleados::join('departamentos','empleados.idd','=','departamentos.idd')
->select('empleados.ide','empleados.nombre','departamentos.nombre as depa','empleados.edad')
->where('empleados.edad','>=','20')->get();


$contar=count($consulta);

return $contar;
}



    public function index($nombre,$dias)
    {

        $pago=100;
        $nomina=$pago*$dias;
        // return view('empleado',compact('nombre','dias'));


//  otra manera de hacer

        // return view('empleado',['nombre'=>$nombre,'dias'=>$dias]

// otra manero con el uso de with
        return view ('empleado')
        ->with('nombre',$nombre)
        ->with('dias',$dias)->with('nomina',$nomina);



    }
    public function pago()
    {
        $sueldo=100;
        $dias =7 ;
        $pago=$dias*$sueldo;

        return "el pago del empleado es $pago";
    }
    public function nomina($sueldo,$dias)
    {
    
        $pago=$dias*$sueldo;
       
        return "el pago del empleado es $pago";
    }

    public function salir()
    {
      return view('welcome');
    }



// ------------------------------------------------------------
// -----------------Layout------------------------------------

    public function boos()
    {
        
    return view("bosstrap");
    }

    public function header()
    {
        $sessiontipo = session('sessiontipo');

        if($sessiontipo<>""){
    return view("layout.header")->with('sessiontipo',$sessiontipo);
        }
}



    public function scrips()
    {
    return view("layout.scrips");
    }


    // ----------------------formulario-------------------



        //  consultas 

    public function eloquent(){

        $consulta = empleados::all();
        return $consulta;
    }


    
public function estados(){
$estados=estados::all();

// return ($estados);
return view('estados')->with('estados',$estados);
}



}






