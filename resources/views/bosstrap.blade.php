@include('layout.header')
@include('layout.scrips')

@section('header')

@endsection


<?php 
$sessionusuario = session('sessionusuario');
$sessiontipo = session('sessiontipo');
$sessionidu = session('sessionidu');
?>

<hr>
 
<b>Bienvenido <?php echo $sessionusuario ?></b>
<b>Bienvenido <?php echo $sessiontipo ?></b>
<b>Bienvenido <?php echo $sessionidu ?></b>
