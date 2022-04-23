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
background-color:rgba(0, 0, 0);

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
background-color:rgba(0, 0, 0);
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
<form action=" " method="post">
@csrf
  <div class="form-group">
    <label for="identidad" ><font color="white">Tarjeta de Identidad del Alumno</font></label>
    <input type="text" name="identidad" class="form-control" id="identidad"required max="13" pattern="[0-9]{13}" title="Ingrese una identidad valida" 
           placeholder="Identidad sin guiones">
      @error('identidad')
        <span class="invalid-feedback" role="alert">
        <i style="color: red">{{ $message }}</i>
        </span>
      @enderror
  </div>
   
  <a href="{{route('votar.login',['dni'=>$profesor->id])}}" type="submit"  class="btn btn-primary" >Ingresar</a>
		<a type="submit" class="btn btn-danger" name="boton" Value="Cancelar"></a>
</form>
<br>
<br>
<center><a href="{{ url('login') }}"><button class="btn btn-warning">ADMINISTRADOR</button></a></center>

<br>
 <div align="center">
			
			
	   </div>
</div>
</center>
</div>
</div>
<script src="js/jquery-1.11.3.min.js"></script>


<script src="js/bootstrap.js"></script>


<center><font color="white" size="7" face="Algerian">VOTACIONES <?php $Year = date("Y");echo "$Year.";echo "\n";?></font></center>
</body>
</html>