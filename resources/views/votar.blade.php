<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Votación</title>


<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/estilo.css" rel="stylesheet">


</head>


<style>

body{


background-image: url(images/votos.png);


background-size: 100%;


}
	
.contenedor{

border-color: black;
border:20px;
margin-top: 20px;
margin: 50px auto;
border-radius: 10px;
margin-right: 25%;
margin-left: 25%;
width: 50%;
height: 550px;




}

.contenedor:hover{

transition: .8s;
background-color:rgba(0,0,0 ,.2);
box-shadow:inset;
   

}



</style>

<body>

    


<div class="contenedor">
	<br><br><br><br><br>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1 class="text-center"><font color="white" size="7" face="Algerian">SISTEMA DE Votación IDO</h1></font><br>
    </div>
  </div>



	<center>
 <div class="center-block col-md-8 col-xs-8">
<form action="{{ route('votar.store') }}" role="form" method="post">
@csrf
  <div class="form-group">
    <label for="identidad"><font color="white">Tarjeta de identidad del Alumno</font></label>
    <input require type="text" name="identidad" class="form-control @error('identidad') is-invalid @enderror" id="identidad"
           placeholder="Identidad del Alumno" value="{{old('identidad')}}">
           @error('identidad')
                <span class="invalid-feedback" role="alert">
                    <i style="color: red">{{ $message }}</i>
                </span>
            @enderror
  </div>

   <input type ="submit" class="btn btn-primary" name="boton" Value="Ingresar">
	<input type ="reset"  class="btn btn-danger" name="boton" Value="Cancelar">

</form>
<br>
<br>
<center><a href="{{route('login.index')}}"><button class="btn btn-warning">ADMINISTRADOR</button></a></center>

<br>
 <div align="center">




</div>
</center>
</div>
</div>
<script src="js/jquery-1.11.3.min.js"></script>


<script src="js/bootstrap.js"></script>




<center><font color="white" size="7" face="Algerian">VOTACIONES <?php $Year = date("Y");echo "$Year";echo "\n";?></font></center>
</body>
</html>
