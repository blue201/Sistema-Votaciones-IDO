<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrar Estudiante</title>
    <link href="css/login.css" rel="stylesheet">
    <script src="js/login.js"></script>

</head>
    <body>
        <div class="mobile-screen2">
            <div class="header">
              <h1>Registrar Estudiante</h1>
            </div>
            
            <div class="logo" style="background-image: url('images/img.png');""></div>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div style="width: 45%;float: left;margin-left: 5%">
                  <input  type="text" name="name" required max="40" placeholder="Nombre Completo"  value="{{old('name')}}"
                  class="@error('name') is-invalid @enderror">
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                        <i style="color: red">{{ $message }}</i>
                      </span>
                  @enderror
                </div>
                <div style="width: 45%;float: left;margin-left: 5%">
                  <input  type="text" name="user" required max="20" placeholder="Nombre de Usuario" value="{{old('user')}}"
                  class="@error('user') is-invalid @enderror">
                  @error('user')
                      <span class="invalid-feedback" role="alert">
                          <i style="color: red">{{ $message }}</i>
                      </span>
                  @enderror
                </div>
                <div style="width: 45%;float: left;margin-left: 5%">
                  <input  type="text" name="identidad" required pattern="[0-9]{13}" 
                  title="Ingrese una identidad valida" value="{{old('identidad')}}" maxlength="13"
                  placeholder="Identidad sin guiones" class="@error('identidad') is-invalid @enderror">
                  @error('identidad')
                      <span class="invalid-feedback" role="alert">
                        <i style="color: red">{{ $message }}</i>
                      </span>
                  @enderror
                </div>
                <div style="width: 45%;float: left;margin-left: 5%">
                  <input type="password" name="password" placeholder="Contraseña" class="@error('password') is-invalid @enderror">
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                        <i style="color: red">{{ $message }}</i>
                      </span>
                  @enderror
                </div>
                <div style="width: 45%;float: left;margin-left: 5%">
                  <input  type="password" name="password_confirmation" placeholder="Confirmar Contraseña">
                </div>

                <button  type="submit" class="login-btn" id="signup-btn">Registrarse</button>
              </form>

              <div class="other-options">
                <div class="option" style="width: 100%" onclick="window.location='{{route('login')}}'" id="prof"><p class="option-text">Iniciar Sesion</p></div>
              </div>

          </div>
    </body>
</html>