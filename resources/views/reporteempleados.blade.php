@include('layout.header')
@include('layout.scrips')

@section('header')

@endsection
<hr>
<div class="container">
    <h1>Reporte empleados</h1>
    <table class="table">
        <br>
        <br>
        <a href="{{route('AltaEmpleado')}}">
        <button type="button" class="btn btn-primary">Alta empleado</button>
        </a>
        <br>  
        @if(Session::has('mensaje'))
        <div class="alert alert-success">{{Session::get('mensaje')}}</div>
        @endif
        <thead>
    <tr>
    <th scope="col">Foto Empleado</th>
      <th scope="col">Clave</th>
      <th scope="col">Nombre Completo</th>
      <th scope="col">Correo</th>
      <th scope="col">Area</th>
      <th scope="col">Operaciones</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    @foreach($consulta as $c)
    <tr>
    <td><img src="{{asset('archivos/'.$c->img)}}" height=50 width=50></td>
      <th scope="row">{{$c->ide}}</th>
      <td>{{$c->nombre}} {{$c->apellido}}</td>
      <td>{{$c->email}}</td>
      <td>{{$c->depa}}</td>
      <td>
        <a href= "{{route('ModificaEmpleado',['ide'=>$c->ide])}}">
          <button type="button" class="btn btn-info">Modificar</button>
      </a>
      @if($sessiontipo=="Admin")
@if($c->deleted_at)
      <a href="{{route('activaempleado',['ide'=>$c->ide])}}">
      <button type="button" class="btn btn-warning">activar</button>   </a>
      <a href="{{route('borrarempleado',['ide'=>$c->ide])}}">
      <button type="button" class="btn btn-warning">eliminar</button> 
      </a>
      </td>
      @else
      <a href="{{route('desactivaempleado',['ide'=>$c->ide])}}">
      <button type="button" class="btn btn-danger">descativar</button> </td>
      @endif
    </tr>
    @endif
    @endforeach
  
  </tbody>
</table>
</div>