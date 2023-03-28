<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@include('layout.header')
@include('layout.scrips')

@section('header')
@endsection
<hr>
    <h1>empresa de nomina</h1>
<br>

nombre del emplado {{$nombre}} trabajo {{$dias}} pago {{$nomina}}

@if ($nombre=='diego')
<h1>hola soy diego</h1>
<hr>

<img src="{{asset('fotos/diego.png')}}" weingt=100 height=100>

@else
<hr>
no tiene imagen
@endif
<hr>
<a href="{{route('salir')}}">salir</a>
<br>
<a href="{{route('boos')}}">vista boostrap</a>
</body>

</html>