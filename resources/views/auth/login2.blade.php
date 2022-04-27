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
background-repeat: no-repeat;
background-size: 100% 100%;
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
background-color:rgba(0,0,0);
box-shadow:inset;
   

}



</style>

<body>

    

<?php
 $cons_usuario="root";
 $cons_contra="";
 $cons_base_datos="ido";
 $cons_equipo="127.0.0.1";
 
 $obj_conexion = mysqli_connect($cons_equipo,$cons_usuario,$cons_contra,$cons_base_datos);
 if(!$obj_conexion)
 {
     echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
 }
 else
 {
     if (isset($_POST["alumno"])) { $alumno=$_POST["alumno"]; }
  
    if (isset($_POST["boton"])) {
      $boton=$_POST["boton"];
      switch ($boton) {
      case "Ingresar":
      if (empty($alumno) ) {$vacio="si";
        break;
      }
  
      $var_consulta= "SELECT * FROM users WHERE identidad = '$alumno' AND voto = '0'";
      $var_resultado = $obj_conexion->query($var_consulta);
      echo $var_resultado;
       $datos=mysqli_fetch_array($var_resultado);
        $alu=$datos["identidad"];
                  $nombre=$datos["name"];
      $voto=$datos["voto"];
  
  
      if ($alumno==$alu) {
        $_SESSION["name"]=$datos["name"];
              $_SESSION["identidad"]=$datos["identidad"];
                $_SESSION["permiso"]="Acceso Permitido";
  
      
        $datos=mysqli_fetch_array($resultado);
        $alu=$datos["cedula_alumno"];
                  $nombre=$datos["nombre"];
      $voto=$datos["voto"];
      

        return view('/');
      }else {
        $acceso="denegado";
     }
  
    }
  }
 }   

 
		?>
		
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
<form  action="{{ route('eleccion.votar') }}">

<div class="form-group">
    <label for="alumno"><font color="white">Tarjeta de identidad del Alumno</font></label>
    <input type="text" name="alumno" class="form-control" id="alumno"
           placeholder="Identidad del Alumno">
  </div>
  <button type="submit" class="btn btn-primary">Ingresar</button>
  <a href="votar" class="btn btn-danger">Cancelar</a>
</form>
<br>
<br>
<center><a href="login"><button class="btn btn-warning">ADMINISTRADOR</button></a></center>

<br>
 <div align="center">
 <font color="white" size="6" face="Algerian">VOTACIONES <?php $Year = date("Y");echo "$Year";echo "\n";?></font>		
			
	</div>
</div>
</center>
</div>
</div>
<script src="js/jquery-1.11.3.min.js"></script>


<script src="js/bootstrap.js"></script>
</body>
</html>