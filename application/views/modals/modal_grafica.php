<?php $valor = $DespidoInjustificado->id_grupo_despido_injustificado;

?>
<script src="chart.min.js"></script>
<?php
$con = new mysqli("localhost","root","","cendana"); // Conectar a la BD
$sql = "select * from despido_injustificado where despido_injustificado.id_grupo_despido_injustificado = $valor"; // Consulta SQL
$query = $con->query($sql); // Ejecutar la consulta SQL
$data = array(); // Array donde vamos a guardar los datos
while($r = $query->fetch_object()){ // Recorrer los resultados de Ejecutar la consulta SQL
    $data[]=$r; // Guardar los resultados en la variable $data
}

$es = "  -  ";
?>

<div class="col-md-12 well">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;"><i class="fa fa-pie-chart"></i> Gráfica Calculadora Despido Injustificado </h3>


  <div class="box box-body">
  <canvas id="grafica" style="width:100%;" height="100"></canvas>
	<script>

var ctx = document.getElementById("grafica");

var data = {
        labels: [ 
			<?php foreach($data as $d):?>
			"<?php echo $d->numero_trabajadores . $es . $d->puesto . $es . $d->departamento;?>",
			<?php endforeach; ?>
			
        ],
        datasets: [
		{
            label: 'Salario Diario',
            data: [
				<?php foreach($data as $d):?>
				<?php echo $d->salario_diario;?>, 
				<?php endforeach; ?>
            ],
            backgroundColor: "#1CEF35",
            borderColor: "#9b59b6",
            borderWidth: 2
        },
		{
			label: 'Dias Trabajados',
            data: [
				<?php foreach($data as $d):?>
				<?php echo $d->dias_trabajados;?>, 
				<?php endforeach; ?>
            ],
            backgroundColor: "#FDFD31",
            borderColor: "#9b59b6",
            borderWidth: 2
		},
		{
			label: 'Indenmizacion Constitucional',
            data: [
				<?php foreach($data as $d):?>
				<?php echo $d->indenmizacion_constitucional;?>, 
				<?php endforeach; ?>
            ],
            backgroundColor: "#F8A012",
            borderColor: "#9b59b6",
            borderWidth: 2
		},
		{
			label: 'Aguinaldo',
            data: [
				<?php foreach($data as $d):?>
				<?php echo $d->aguinaldo;?>, 
				<?php endforeach; ?>
            ],
            backgroundColor: "#27F1EB",
            borderColor: "#9b59b6",
            borderWidth: 2
		},
		{
			label: 'Vacaciones',
            data: [
				<?php foreach($data as $d):?>
				<?php echo $d->vacaciones;?>, 
				<?php endforeach; ?>
            ],
            backgroundColor: "#F56AE7",
            borderColor: "#9b59b6",
            borderWidth: 2
		},
		{
			label: 'Prima Vacacional',
            data: [
				<?php foreach($data as $d):?>
				<?php echo $d->prima_vacacional;?>, 
				<?php endforeach; ?>
            ],
            backgroundColor: "#D08FEF",
            borderColor: "#9b59b6",
            borderWidth: 2
		},
		{
			label: 'Prima Antiguedad',
            data: [
				<?php foreach($data as $d):?>
				<?php echo $d->prima_antiguedad;?>, 
				<?php endforeach; ?>
            ],
            backgroundColor: "#ABE52F",
            borderColor: "#9b59b6",
            borderWidth: 2
		},
		{
			label: 'Total Registro',
            data: [
				<?php foreach($data as $d):?>
				<?php echo $d->total_registro;?>, 
				<?php endforeach; ?>
            ],
            backgroundColor: "#F89289",
            borderColor: "#9b59b6",
            borderWidth: 2
		}
		]
    };
	
var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    };
	
var grafica = new Chart(ctx, {
    type: 'bar', /* valores: line, bar*/
    data: data,
    options: options
});
</script>
  </div>

  
</div>
