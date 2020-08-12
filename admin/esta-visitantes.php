<?php
$consulta = $pdo->prepare("
SELECT
(SELECT COUNT(usr_id) FROM usuarios WHERE usr_tipo=2 AND MONTH(usr_registro)=1),
(SELECT COUNT(usr_id) FROM usuarios WHERE usr_tipo=2 AND MONTH(usr_registro)=2),
(SELECT COUNT(usr_id) FROM usuarios WHERE usr_tipo=2 AND MONTH(usr_registro)=3),
(SELECT COUNT(usr_id) FROM usuarios WHERE usr_tipo=2 AND MONTH(usr_registro)=4),
(SELECT COUNT(usr_id) FROM usuarios WHERE usr_tipo=2 AND MONTH(usr_registro)=5),
(SELECT COUNT(usr_id) FROM usuarios WHERE usr_tipo=2 AND MONTH(usr_registro)=6),
(SELECT COUNT(usr_id) FROM usuarios WHERE usr_tipo=2 AND MONTH(usr_registro)=7),
(SELECT COUNT(usr_id) FROM usuarios WHERE usr_tipo=2 AND MONTH(usr_registro)=8),
(SELECT COUNT(usr_id) FROM usuarios WHERE usr_tipo=2 AND MONTH(usr_registro)=9),
(SELECT COUNT(usr_id) FROM usuarios WHERE usr_tipo=2 AND MONTH(usr_registro)=10),
(SELECT COUNT(usr_id) FROM usuarios WHERE usr_tipo=2 AND MONTH(usr_registro)=11),
(SELECT COUNT(usr_id) FROM usuarios WHERE usr_tipo=2 AND MONTH(usr_registro)=12)
");
$consulta->execute();
$datos = $consulta->fetch();

$male = "$datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5], $datos[6], $datos[7], $datos[8], $datos[9], $datos[10], $datos[11]";
?>

<script type="application/javascript">
var options = {
  chart: {
    height: 280,
    type: 'bar',
    stacked: true,
    toolbar: {
      show: false
    },
    zoom: {
      enabled: true
    }
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: '30%',
    },
  },
  dataLabels: {
    enabled: true
  },
  series: [
	  {
		name: 'Suscriptores',
		data: [<?=$male;?>]
	  }
  ],
  xaxis: {
    type: 'month',
    categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
  },
  legend: {
    offsetY: -7
  },
  fill: {
    opacity: 1
  },
  colors: ['#01902d', '#666666'],
  tooltip: {
    y: {
      formatter: function(val) {
        return  "Suscriptores " + val
      }
    }
  },
}
var chart = new ApexCharts(
  document.querySelector("#visitors"),
  options
);
chart.render();
</script>