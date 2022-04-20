<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<center>
    <h3>Acta De Cierre De Elecciones Estudiantiles.</h3>
    <h3>Instituto Departamental De Oriente.</h3>
    <h3>AÑO {{date("Y")}}.</h3>
</center>
<p>
    Los abajo suscritos y autoridades de la presente institución mediante el presente
    documento de acta hacemos del conocimiento que una vez llevada a cabo las elecciones
    estudiantiles mediante el proceso virtual en la que se invito a participar a todas las
    jornadas de atención estudiantil en el Instituto Departamental de Oriente (IDO).
    Se obtuvieron los resultados siguientes resultando como ganadora la planilla
</p>
<br>
<p>
    denominada <strong>{{$ganador->name}}</strong> perteneciente a la modalidad de estudio <strong>{{$ganador->modalidads->descripcion}}</strong> la cual gano con el
    <strong>{{ number_format($porcentaje,2)}}%</strong> de los votos validos.
</p>
<br>
<p>
    <strong>Descrita y constituida de la siguiente manera:</strong>
    <br>
    <table class="table table-bordered">
        <thead>
            <th>Cargo</th>
            <th>Nombre</th>
            <th>Identidad</th>
        </thead>
        <tbody>
            @foreach ($candidatos as $c)
            <tr>
            <td>{{$c->cargopolitico->nombre}}</td>
            <td>{{$c->name}}</td>
            <td>{{$c->identidad}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @php
    $mes = "";
        switch (date("m")) {
            case 1:
                $mes = "Enero";
            break;
            case 2:
                $mes = "Febrero";
            break;
            case 3:
                $mes = "Marzo";
            break;
            case 4:
                $mes = "Abril";
            break;
            case 5:
                $mes = "Mayo";
            break;
            case 6:
                $mes = "Junio";
            break;
            case 7:
                $mes = "Julio";
            break;
            case 8:
                $mes = "Agosto";
            break;
            case 9:
                $mes = "Septiembre";
            break;
            case 10:
                $mes = "Octubre";
            break;
            case 11:
                $mes = "Noviembre";
            break;
            case 12:
                $mes = "Diciembre";
            break;
        }
    @endphp

<p>Y para dar fe se firma la presente acta de cierre a los {{date("d")}} días de mes de {{$mes}} del año {{date("Y")}}</p>



</p>