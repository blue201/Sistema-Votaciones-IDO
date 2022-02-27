<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesion</title>
    <link href="css/login.css" rel="stylesheet">
    <script src="js/login.js"></script>

</head>
    <body>
        <div class="mobile-screen">
            <div class="header">
              <h1>Bienvenido</h1>
            </div>
            
            <div class="logo" style="background-image: url('images/img.png');""></div>
            
            <form method="POST" action="{{ route('login') }}">
              @csrf
                  <input  type="text" name="identidad" required max="13" pattern="[0-9]{13}" title="Ingrese una identidad valida" 
                  placeholder="Identidad sin guiones">
                  @error('identidad')
                      <span class="invalid-feedback" role="alert">
                        <i style="color: red">{{ $message }}</i>
                      </span>
                  @enderror

                  <input type="password" name="password" placeholder="Contraseña" >
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                        <i style="color: red">{{ $message }}</i>
                      </span>
                  @enderror
              <button type="submit" class="login-btn">Iniciar Sesion</button>
            </form>
            
            
            
            <div class="other-options">
              <div style="width: 100%" class="option" onclick="window.location='{{route('register')}}'" id="fPass"><p class="option-text">Registrar Estudiante</p></div>
            </div>
            
          </div>
    </body>
</html>