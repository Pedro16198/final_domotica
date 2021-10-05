<?php
include '../funciones.php';
include '../conexion.php';
// session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href=" <?php echo base_url('css/normalize.css') ?> ">
  <link rel="stylesheet" href=" <?php echo base_url('css/container.css') ?> ">
  <link rel="stylesheet" href=" <?php echo base_url('css/footer.css') ?> ">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- SWEET ALERT 2-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!-- CLOCKS -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <!-- JQUERY -->
  <script src="<?php echo base_url('js/jquery-3.5.1.js') ?> "> </script>

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <!--MULTISELECT2-->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <title>Panel de Usuario</title>
</head>

<body>
  <?php require_once('navbar-Admin.php'); ?>
  <div class="container">
    <img class="imagenpanel" src="../img/mesa.png" alt="">
    <div class="row ">
      <div class="col s12 m12 center-align background">
        <h3>Medición en Tiempo Real</h3>
        <div class="clocks">
          <div id="chart_div" class="clock" style="/*width: 820px; height: 200px;*/"></div>
        </div>

      </div>
    </div>
    <div class="row ">
      <div class="col s12 m12 center-align background">
        <h3>Historial de Mediciones</h3>
        <div class="filtros">
          <h6>Filtros</h6>
          <i class="material-icons">today</i>
          <input id="fecha_medicion" type="text" class="datepicker" placeholder="Seleccione fecha">
          <script>
            $('.datepicker').datepicker({
              firstDay: true,
              format: 'yyyy-mm-dd',
              i18n: {
                months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"],
                weekdays: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
                weekdaysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                weekdaysAbbrev: ["D", "L", "M", "M", "J", "V", "S"]
              }
            });
          </script>
          <i class="material-icons small">search</i>
          <!-- <select name="sensor" style="display: block">
            <option>1</option>
            <option>2</option>
            <option>3</option>
          </select> -->
          <input type="text" name="buscar" id="sensor" placeholder="Ingrese el sensor a buscar" name="sensor">
          <button id="busca_sensor" class="btn waves-effect waves-light" type="submit">Buscar
            <i class="material-icons right">send</i>
          </button>
        </div>
        <div class="tabla">
          <table id="resultados" class="responsive-table centered center-align">
            <thead>
              <tr>
                <th>Sensor</th>
                <th>Medición</th>
                <th>Fecha</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script>
google.charts.load('current', { 'packages': ['gauge'] });
google.charts.setOnLoadCallback(drawChart);
base_url = 'http://localhost/Proyecto_Domotica/';
  $(document).ready(function($) {
    $('#busca_sensor').on('click', function(event) {
      event.preventDefault();
      var sensor = $('#sensor').val();
      var fecha = $('#fecha_medicion').val();
      $.ajax({
        url: base_url + 'controladores/ajax_filtros.php',
        type: 'POST',
        dataType: 'json',
        data: {
          sensor : sensor,
          fecha : fecha,
      },
      })
      .done(function(data) {
        console.log(data);
        $('#resultados tbody tr').remove();
        if(data != 'false'){
          var fila = '';
          $.each(data, function (i, item) {
              fila += '<tr id="'+ item[0] +'"><td>' + $('#sensor').val() + '</td><td>' + item[1] + '</td><td>' + item[2] + '</td></tr>';
          });
          $('#resultados').append(fila);
        }else{ 
          Swal.fire({
          icon: 'error',
          title: 'No se encontraron resultados. Intente Nuevamente!',
          showConfirmButton: false,
          timer: 2000
        });
        }
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      
    });
  });

function drawChart() {

    var config = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['Humedad', 0],
        ['Temperatura', 0],
        ['Aire', 0],
        ['Gas', 0],
        ['Movimiento', 0]
    ]);

    var options = {
        width: 820,
        height: 200,
        redFrom: 90,
        redTo: 100,
        yellowFrom: 75,
        yellowTo: 90,
        minorTicks: 5
    };
    // var opc_gas = {
    //     width: 820,
    //     height: 200,
    //     redFrom: 900,
    //     redTo: 1000,
    //     yellowFrom: 750,
    //     yellowTo: 900,
    //     minorTicks: 5
    // };

    var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

    chart.draw(config, options);
    /*Humedad*/
    setInterval(function() {
      $.ajax({
            url: base_url+'controladores/ajax_sensores.php',
            type: 'POST',
            dataType: 'JSON',
            data: {sensor: 'humedad'},
        }).done(function(data) {
          //Actulizo los datos del clock
          config.setValue(0, 1, data['dato']);
          chart.draw(config, options);
          // console.log(data);
        });
    }, 30000);
    /*TEMPERATURA*/
    setInterval(function() {
        $.ajax({
            url: base_url+'controladores/ajax_sensores.php',
            type: 'POST',
            dataType: 'JSON',
            data: {sensor: 'temperatura'},
        }).done(function(data) {
          //Actulizo los datos del clock
          config.setValue(1, 1, data['dato']);
          chart.draw(config, options);
          // console.log(data);
        });
    }, 30000);
    /*AIRE*/
    setInterval(function() {
      $.ajax({
            url: base_url+'controladores/ajax_sensores.php',
            type: 'POST',
            dataType: 'JSON',
            data: {sensor: 'aire'},
        }).done(function(data) {
          //Actulizo los datos del clock
          config.setValue(2, 1, data['dato']);
          chart.draw(config, options);
        });
    }, 30000);
    /*GAS*/
    setInterval(function() {
      $.ajax({
            url: base_url+'controladores/ajax_sensores.php',
            type: 'POST',
            dataType: 'JSON',
            data: {sensor: 'gas'},
        }).done(function(data) {
          //Actulizo los datos del clock
        config.setValue(3, 1, data['dato']);
        chart.draw(config, options);
        // console.log(data);
        });
    }, 30000);
    /*MOVIMIENTO*/
    setInterval(function() {
      $.ajax({
            url: base_url+'controladores/ajax_sensores.php',
            type: 'POST',
            dataType: 'JSON',
            data: {sensor: 'movimiento'},
        }).done(function(data) {
          //Actulizo los datos del clock
        config.setValue(4, 1, data['dato']);
        chart.draw(config, options);
        // console.log(data);
        });
    }, 30000);
}
  </script>
  
</body>

</html>