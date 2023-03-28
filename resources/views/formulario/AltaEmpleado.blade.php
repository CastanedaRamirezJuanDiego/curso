@include('layout.header')
@include('layout.scrips')

@section('header')

@endsection
<hr>
<div class="container">
<h1>Alta de empleado</h1>
<hr>
<form action = "{{route('GuardarEmpleado')}}" method = "POST" enctype='multipart/form-data'>
    {{csrf_field()}}
    <div class="well">
      <div class="form-group">
          <label for="dni">Clave empleado:
          @if($errors->first('ide'))
<p class='text-danger'>{{$errors->first('ide')}}</p>
          @endif
          </label>
          <input type="text" name="ide" id="ide" value= "{{$idesigue}}" readonly='readonly' class="form-control" placeholder="Clave empleado" tabindex="5">
      </div>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="nombre">Nombre:
                        @if($errors->first('nombre'))
<p class='text-danger'>{{$errors->first('nombre')}}</p>
          @endif
                    </label>
                <input type="text" name="nombre" id="nombre" value= "{{old('nombre')}}" class="form-control" placeholder="Nombre" tabindex="1">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="apellido">Apellido:
                        @if($errors->first('apellido'))
<p class='text-danger'>{{$errors->first('apellido')}}</p>
          @endif
                    </label>
                    <input type="text" name="apellido" id="apellido"  value= "{{old('apellido')}}" class="form-control" placeholder="Apellido" tabindex="2">
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
                    <input type="email" name="email" id="email"  value= "{{old('email')}}" class="form-control" placeholder="Email" tabindex="4">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="celular">Celular:
                        @if($errors->first('celular'))
<p class='text-danger'>{{$errors->first('celular')}}</p>
          @endif
                    </label>
                    <input type="text" name="celular" id="celular" value= "{{old('celular')}}"  class="form-control" placeholder="Celular" tabindex="3">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="celular">edad:
                    </label>
                    <input type="text" name="edad" id="edad" value= "{{old('edad')}}"  class="form-control" placeholder="edad" tabindex="3">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="celular">salario:
                    </label>
                    <input type="text" name="salario" id="salario" value= "{{old('salario')}}"  class="form-control" placeholder="salario" tabindex="3">
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
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo1" name="sexo"    value = "M" class="custom-control-input" checked="">
                <label class="custom-control-label" for="sexo1">Masculino</label>
                </div>
                <div class="custom-control custom-radio">
                <input type="radio" id="sexo2" name="sexo"  value = "F" class="custom-control-input">
                <label class="custom-control-label" for="sexo2">Femenino</label>
                </div>


            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
<hr>
              <div class="form-group">
                <label for="dni">Departamento:
                    @if($errors->first('idd'))
<p class='text-danger'>{{$errors->first('idd')}}</p>
          @endif
                </label>
                <select name = 'idd' class="custom-select">
                  <option selected="">Selecciona un departamento</option>
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
            </textarea>
        </div>
        <hr>
        <div class="form-group">
            <label for="dni">Foto de perfil:
                @if($errors->first('img'))
<p class='text-danger'>{{$errors->first('img')}}</p>
          @endif </label >
            <input type='file' name="img" id="img"  class="form-control" tabindex="6">
            </input>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-6 col-md-6"><input type="submit" value="Guardar" class="btn btn-danger btn-block btn-lg" tabindex="7"
                title="Guardar datos ingresados"></div>
        </div>
</form>