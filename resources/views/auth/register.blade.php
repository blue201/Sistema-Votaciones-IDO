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

            <style>
              select{
                border: none;
                border-left: 5px solid;
                background: none;
                border-color: rgb(225, 40, 54);
                color: rgba(255, 254, 254, 0.877);
                font-weight: 300;
                font-size: 18px;
                transition: all .2s ease-in-out;
              }

              option{
                border: none;
                border-left: 5px solid;
                background: rgb(0, 0, 0);
                border-color: rgb(225, 40, 54);
                color: rgb(247, 244, 244);
                font-weight: 300;
                font-size: 18px;
                transition: all .2s ease-in-out;
              }

              select, .login-btn {
                  font-family: 'Open Sans', sans-serif;
                  position: relative;
                  display: block;
                  margin: 20px auto;
                  width: 84%;
              }
            </style>
            
            <div class="logo" style="background-image: url('images/img.png');""></div>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div style="width: 30%;float: left;margin-left: 3%">
                  <input  type="text" name="name" required max="40" placeholder="Nombre Completo"  value="{{old('name')}}"
                  class="@error('name') is-invalid @enderror">
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                        <i style="color: red">{{ $message }}</i>
                      </span>
                  @enderror
                </div>
                <div style="width: 30%;float: left;margin-left: 3%">
                  <input  type="text" name="user" required max="20" placeholder="Nombre de Usuario" value="{{old('user')}}"
                  class="@error('user') is-invalid @enderror">
                  @error('user')
                      <span class="invalid-feedback" role="alert">
                          <i style="color: red">{{ $message }}</i>
                      </span>
                  @enderror
                </div>
                <div style="width: 30%;float: left;margin-left: 3%">
                  <input  type="text" name="identidad" required pattern="[0-9]{13}" 
                  title="Ingrese una identidad valida" value="{{old('identidad')}}" maxlength="13"
                  placeholder="Identidad sin guiones" class="@error('identidad') is-invalid @enderror">
                  @error('identidad')
                      <span class="invalid-feedback" role="alert">
                        <i style="color: red">{{ $message }}</i>
                      </span>
                  @enderror
                </div>
                <!--nuevos datos-->
                <div style="width: 30%;float: left;margin-left: 3%">
                  <select name="modalidad" id="modalidad" required class="@error('modalidad') is-invalid @enderror">
                    <option style="display: none" value="">Seleccione modalidad</option>
                    @foreach ($modalidads as $modalidad)
                      <option value="{{$modalidad->id}}">{{$modalidad->descripcion}}</option>
                    @endforeach
                  </select>
                  @error('modalidad')
                      <span class="invalid-feedback" role="alert">
                        <i style="color: red">{{ $message }}</i>
                      </span>
                  @enderror
                </div>
                <div style="width: 30%;float: left;margin-left: 3%">
                  <select name="cursos" id="cursos" required class="@error('cursos') is-invalid @enderror">
                    <option style="display: none" value="">Seleccione el curso</option>
                    @foreach ($cursos as $modalidad)
                      <option value="{{$modalidad->id}}">{{$modalidad->descripcion}}</option>
                    @endforeach
                  </select>
                  @error('cursos')
                      <span class="invalid-feedback" role="alert">
                        <i style="color: red">{{ $message }}</i>
                      </span>
                  @enderror
                </div>
                <div style="width: 30%;float: left;margin-left: 3%">
                  <select name="grupos" id="grupos" required class="@error('grupos') is-invalid @enderror">
                    <option style="display: none" value="">Seleccione el grupo</option>
                    @foreach ($grupos as $modalidad)
                      <option value="{{$modalidad->id}}">{{$modalidad->descripcion}}</option>
                    @endforeach
                  </select>
                  @error('grupos')
                      <span class="invalid-feedback" role="alert">
                        <i style="color: red">{{ $message }}</i>
                      </span>
                  @enderror
                </div>
                <div style="width: 30%;float: left;margin-left: 3%">
                  <select name="jornadas" id="jornadas" required class="@error('jornadas') is-invalid @enderror">
                    <option style="display: none" value="">Seleccione la jornada</option>
                    @foreach ($jornadas as $modalidad)
                      <option value="{{$modalidad->id}}">{{$modalidad->descripcion}}</option>
                    @endforeach
                  </select>
                  @error('jornadas')
                      <span class="invalid-feedback" role="alert">
                        <i style="color: red">{{ $message }}</i>
                      </span>
                  @enderror
                </div>

                <!--nuevos datos-->
                <div style="width: 30%;float: left;margin-left: 3%">
                  <input type="password" name="password" placeholder="Contraseña" class="@error('password') is-invalid @enderror">
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                        <i style="color: red">{{ $message }}</i>
                      </span>
                  @enderror
                </div>
                <div style="width: 30%;float: left;margin-left: 3%">
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