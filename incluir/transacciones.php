<div class="container">
<h3 class="page-header"><i class="fa fa-exchange"></i> Reporte de transacciones</h3>
<div class="row">
	<div class="col-xs-12">
		<div class="form-inline">
			<label for="demo">Selecciona un rango de fecha</label>
			<form method="get" action="reporte_transaccion">
				<i class="fa fa-calendar"></i> 
            <input type="text" name="rango_fecha" id="demo" class="form-control">
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Generar</button>
        	</form>
            <!-- js boton generar -->
            <script type="text/javascript">
            /*
            $('#boton_generar').click(function(){
            	alert('generar');
            });
			*/
            </script>
            </div>
         </div>
</div>
<div class="row">
<div class="col-xs-12">
	<div class="mostrar_historial">
	</div>
</div>
</div>
</div>
<!-- js data -->
<script type="text/javascript">
$('#demo').daterangepicker({
	locale: {
      format: 'YYYY-MM-DD',
      "separator": " / "
    },
    "linkedCalendars": false,
    //"startDate": "09/05/2015",
    //"endDate": "09/11/2015",
    "opens": "center"
}, function(start, end, label) {
  //console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
});
</script>