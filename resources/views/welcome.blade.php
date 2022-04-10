@extends('plantilla.madre')
@section('titulo')
Bienvenido
@stop
@section('contenido')
@if(session('denegar'))
<div class="alert alert-danger">
    {{session('denegar')}}
</div>
@endif

<div>
    <script src="{{ asset('js/graficos.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
  
  var colors = [
      '#008FFB',
      '#FF4560',
      '#26a69a',
      '#546E7A',
      '#775DD0',
      '#D10CE8',
      '#FEB019',
      '#00E396',
    ]
  
</script>

<?php 
$suma = 0;
foreach ($votos as $b) {
    $suma += $b->votos;
}

if($suma==0){
$suma=1;
}
?>

<div id="chart">
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    var options = {
           series: [{
           name: 'Votos',
           data: [
             @foreach ($votos as $b)
             {{$b->votos}},
             @endforeach
           ]
         }],
           chart: {
           height: 400,
           type: 'bar',
           events: {
             click: function(chart, w, e) {
 
             }
           }
         },
         colors: colors,
         plotOptions: {
           bar: {
             columnWidth: '45%',
             distributed: true,
           }
         },
         dataLabels: {
           enabled: false
         },
         legend: {
           show: false
         },
         xaxis: {
           categories: [
             @foreach ($votos as $b)
               ["{{$b->name}}","{{number_format(($b->votos/$suma)*100, 2, '.', '')}}%"],
             @endforeach
           ],
           labels: {
             style: {
               colors: colors,
               fontSize: '16px'
             }
           }
         },
         title: {
     text: 'Gráfico de votaciones',
     floating: false,
     align: 'center',
     style: {
       color: '#444',
       fontSize: '30px',
     }
   }
         };
 
         var chart = new ApexCharts(document.querySelector("#chart"), options);
         chart.render();
 </script>

</div>
@stop