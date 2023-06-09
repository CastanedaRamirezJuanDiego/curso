@include('layout.header')
@include('layout.scrips')

@section('header')

@endsection
<hr>
<div class="container">
<h1>Modifica de empleado</h1>
<hr>
<form action = "{{route('guardarmodificacion')}}" method = "POST"  enctype='multipart/form-data'>
    {{csrf_field()}}
    <div class="well">
      <div class="form-group">
          <label for="dni">Clave empleado:
          @if($errors->first('ide'))
<p class='text-danger'>{{$errors->first('ide')}}</p>
          @endif
          </label>
          <input type="text" name="ide" id="ide" value= "{{$consulta->ide}}" readonly='readonly' class="form-control" placeholder="Clave empleado" tabindex="5">
      </div>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="nombre">Nombre:
                        @if($errors->first('nombre'))
<p class='text-danger'>{{$errors->first('nombre')}}</p>
          @endif
                    </label>
                <input type="text" name="nombre" id="nombre" value= "{{$consulta->nombre}}" class="form-control" placeholder="Nombre" tabindex="1">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="apellido">Apellido:
                        @if($errors->first('apellido'))
<p class='text-danger'>{{$errors->first('apellido')}}</p>
          @endif
                    </label>
                    <input type="text" name="apellido" id="apellido"  value= "{{$consulta->apellido}}" class="form-control" placeholder="Apellido" tabindex="2">
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="email">Email:
                        @if($errors->first('email'))
<p class='text-danger'>{{$errors->first('email')}}</p>
          @endif
                    </label>
                    <input type="email" name="email" id="email"  value= "{{$consulta->email}}" class="form-control" placeholder="Email" tabindex="4">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="celular">Celular:
                        @if($errors->first('celular'))
<p class='text-danger'>{{$errors->first('celular')}}</p>
          @endif
                    </label>
                    <input type="text" name="celular" id="celular" value= "{{$consulta->celular}}"  class="form-control" placeholder="Celular" tabindex="3">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="celular">edad:
                    </label>
                    <input type="text" name="edad" id="edad" value= "{{$consulta->edad}}"  class="form-control" placeholder="edad" tabindex="3">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="celular">salario:
                    </label>
                    <input type="text" name="salario" id="salario" value= "{{$consulta->salario}}"  class="form-control" placeholder="salario" tabindex="3">
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <label for="dni">Sexo:
                    @if($errors->first('sexo'))
<p class='text-danger'>{{$errors->first('sexo')}}</p>
          @endif
                </label>
                @if($consulta->sexo=='F')
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo1" name="sexo"    value = "M" class="custom-control-input" >
                <label class="custom-control-label" for="sexo1">Masculino</label>
                </div>
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo2" name="sexo"  value = "F" class="custom-control-input" checked="">
                <label class="custom-control-label" for="sexo2">Femenino</label>
                </div>
                @else
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo1" name="sexo"    value = "M" class="custom-control-input" checked="">
                <label class="custom-control-label" for="sexo1">Masculino</label>
                </div>
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo2" name="sexo"  value = "F" class="custom-control-input">
                <label class="custom-control-label" for="sexo2">Femenino</label>
                </div>
                @endif


            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
<hr>
              <div class="form-group">
                <label for="dni">Departamento:</label>
                <select name ='idd' class="custom-select">
                  <option value="{{$consulta->idd}}">{{$consulta->depa}}</option>
                  @foreach($departamentos as $depa)
                  <option value="{{$depa->idd}}">{{$depa->nombre}}</option>
                  @endforeach
                </select>
              </div>

            </div>
        </div>
        <div class="form-group">
            <label for="dni">Descripción:
            </label >
            <textarea name="descripcion" id="descripcion"  class="form-control" tabindex="5">
            {{$consulta->descripcion}}</textarea>
        </div>
        <hr>
        <div class="form-group">
            <label for="dni">Foto de perfil:
                @if($errors->first('img'))
<p class='text-danger'>{{$errors->first('img')}}</p>
          @endif </label >
          <img src="{{asset('archivos/'.$consulta->img)}}" height=150 width=150>
            <input type='file' name="img" id="img"  class="form-control" tabindex="6">
            </input>
        <div class="row">
            <div class="col-xs-6 col-md-6"><input type="submit" value="Guardar" class="btn btn-danger btn-block btn-lg" tabindex="7"
                title="Guardar datos ingresados"></div>
        </div>
</form>