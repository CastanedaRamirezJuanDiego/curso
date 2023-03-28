@include('layout.header')
@include('layout.scrips')

@section('header')
@endsection
<hr>
<div class="container">
    <h1>Proceso {{$proceso}}</h1>
    <br>
    
@if($error==1)
    <div class= "alert alert-success">{{$mensaje}}</div>
    @else
    <div class= "alert alert-warning">{{$mensaje}}</div>
    @endif
</div>