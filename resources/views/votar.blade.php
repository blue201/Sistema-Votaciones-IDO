<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
<title>Votación</title>


<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/estilo.css" rel="stylesheet">


</head>


<style>

body{

margin: 0;
padding: 0;
background-image: url(images/voto.png);
background-size: cover;
background-repeat: no-repeat;
background-attachment: fixed;
background-position: left;
}
	
.contenedor{

border-color: black;
border:20px;
margin-top: 20px;
margin: 50px auto;
border-radius: 10px;
margin-right: 25%;
margin-left: 25%;
width: 100% auto;
height: 100% auto;




}

.contenedor:hover{
  float: left;
transition: .8s;
background-color:rgba(0,0,0 ,.8);
box-shadow:inset;
width: 100% auto;
height: 100% auto;

}



</style>

<body>

    

@if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    </br>
<div class="contenedor">
    </br>
    <div class="container-fluid">
        <div class="col">
        <center>
          <div class="col-md-8 col-md-offset-2">
            <font color="white" size="6%" face="Algerian">SISTEMA DE Votación IDO</font><br><br>
          </div>
</center>
        </div>
          <center>
        <div class="center-block col-md-8 col-xs-8">
          <form action="{{ route('votar.store') }}" role="form" method="post">
            @csrf
            <div class="form-group">
              <label for="identidad"><font color="white" size="3%">Tarjeta de identidad del Alumno</font></label>
              <input require type="text" name="identidad" class="form-control @error('identidad') is-invalid @enderror" id="identidad"
              placeholder="Identidad del Alumno sin Guiones"  required maxlength="13" pattern="[0-9]{13}" value="{{old('identidad')}}">
              @error('identidad')
                <span class="invalid-feedback" role="alert">
                    <i style="color: red">{{ $message }}</i>
                </span>
              @enderror
           </div>
              <input type ="submit" class="btn btn-primary" name="boton" Value="Ingresar">
              <input type ="reset"  class="btn btn-danger" name="boton" Value="Cancelar">
          </form>
            </br>
            <center><a href="{{route('login.index')}}"><button class="btn btn-warning">ADMINISTRADOR</button></a></center>
            </br>
          <div align="center">
            <center><font color="white" size="5" face="Algerian">VOTACIONES <?php $Year = date("Y");echo "$Year";echo "\n";?></font></center>
            </br>
          </div>
        </div>
    </div>
  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap.js"></script>
</div>
</body>
</html>
