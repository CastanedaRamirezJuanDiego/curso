<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
   <script>
    $(document).ready(function(){
        $("#estados").on('change',function() {
            var id = $(this).find(":selected").val();
            console.log(ide);
            if(ide == 0){
                $("#municipios").html('<option value="0">-- Seleccione un estado antes --</option>');
            }
            else{
                $("#municipios").load('municipios?id='+ide);
            }
        }):
    });
</script>
</head>
<body>
    <div class="container">
        <h1>Formulario de registro</h1>
        <hr>
        <select id="ide">
            <option value="0">-- selecione un estado ---</option>
        @foreach($estados as $estados)
        <option value="{{$estados->ide}}">{{$estados->nombre}}</option>
        @endforeach
        </select>
<hr>
<select id="municipios">
     <option value="0">--seleccione un estado antes --</option>
     </select>
     <hr>
    </div>
    
</body>
</html>