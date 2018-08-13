<script type="text/javascript">
$(document).ready(function(){

    $('table').DataTable({
      language:
      {
  "sProcessing":     "Procesando...",
  "sLengthMenu":     "Mostrar _MENU_ registros",
  "sZeroRecords":    "No se encontraron resultados",
  "sEmptyTable":     "Ningún dato disponible en esta tabla",
  "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
  "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
  "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
  "sInfoPostFix":    "",
  "sSearch":         "Buscar:",
  "sUrl":            "",
  "sInfoThousands":  ",",
  "sLoadingRecords": "Cargando...",
  "oPaginate": {
    "sFirst":    "Primero",
    "sLast":     "Último",
    "sNext":     "Siguiente",
    "sPrevious": "Anterior"
  },
  "oAria": {
    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
  }
}
    });

});
</script>
<div class="container">
<h3 class="page-header"><i class="fa fa-medkit"></i> Insumos en Almacén</h3>
<?php
//Mensaje
  if (isset($_SESSION['mensaje']) && !empty($_SESSION['mensaje'])) {
    //imprimo el mensaje y luego lo elimino.
    if (isset($_SESSION['mensaje']['tipo']) && $_SESSION['mensaje']['tipo'] == 1)  {
      $tipo_alert = 'alert-success';
      $icono = '<i class="fa fa-check-circle-o"></i>';
    }else{
      $tipo_alert = 'alert-danger';
      $icono = '<i class="fa fa-exclamation-circle"></i>';
    }
    ?>
<div style="margin-top:10px;" class="alert <?php echo $tipo_alert; ?>" role="alert"><?php echo $icono; ?> <strong><?php echo $_SESSION['mensaje']['titulo']; ?></strong><br /><?php echo $_SESSION['mensaje']['mensaje']; ?></div>
    <?php
    unset($_SESSION['mensaje']);
  }
//Mensaje
 ?>
<?php 
include_once('incluir/DB.php');
$db = new DB();
$db->where('flag_eliminado','0');
$insumos = $db->get('producto');

 ?>
<!-- JS para cada accion -->
<script type="text/javascript">
$(document).ready(function(){
	/*
	En caso de ser in ingreso
	*/
	$('button[name=ingresar]').click(function(boton){
    $('#modal_ingresar_insumo').on('shown.bs.modal',(function(){
      $('#modal_ingresar_insumo form input[name=cantidad_ingresar]').focus();
    }));
		//realizo los pasos para ingresar el insumo
		var insumoid = $(this).data('insumoid');
    $('#nombre_insumo_titulo').html($(this).data('nombre-insumo'));
    $('#modal_ingresar_insumo input[type=hidden]').val(insumoid);
		$('#modal_ingresar_insumo').modal('show');
	});
	/*
	En caso de ser egreso
	*/
	$('button[name=egresar]').click(function(boton){

    //focus en el primer input
    $('#modal_egresar_insumo').on('shown.bs.modal',(function(){
      $('#modal_egresar_insumo form input[name=cantidad_egresar]').focus();
    }));
		//realizo los pasos para ingresar el insumo
    var cantidad_disponible = $(this).data('cantidad-disponible');
		var insumoid = $(this).data('insumoid');
    $('#modal_egresar_insumo form input[type=number]').attr('max',cantidad_disponible);
    $('#modal_egresar_insumo h4 span').html($(this).data('nombre-insumo'));
    $('#modal_egresar_insumo input[type=hidden]').val(insumoid);
		$('#modal_egresar_insumo').modal('show');
	});

  /*
  En caso de borrar
  */
  function boton_borrar(productoid, nombre_insumo){
    //realizo los pasos para ingresar el insumo
    //var cantidad_disponible = $(boton.target).data('cantidad-disponible');
    //var productoid = $(this).data('productoid');
    //$('#modal_egresar_insumo form input[type=number]').attr('max',cantidad_disponible);
    $('#modal_borrar_insumo h4 span').html(nombre_insumo);
    $('#modal_borrar_insumo input[type=hidden]').val(productoid);
    $('#modal_borrar_insumo').modal('show');
  }


  //Acciones
 $('table').click(function(boton){

  var boton = $(boton.target);
  var productoid = boton.data('productoid');
  var accion = boton.attr('name');
  var nombre_insumo = boton.data('nombre-insumo');

  if(productoid == undefined){
    //busco en el nodo padre
    var boton = $(boton.context.parentElement);
    var productoid = boton.data('productoid');
    var accion = boton.attr('name');
    var nombre_insumo = boton.data('nombre-insumo');
  }

  switch(accion){
    case 'editar':
    //console.log(productoid);
    //console.log(accion);
    //console.log(nombre_insumo);
    boton_editar(productoid, nombre_insumo);
    break;
    case 'borrar':
    //console.log(productoid);
    //console.log(accion);
    //console.log(nombre_insumo);
    boton_borrar(productoid, nombre_insumo);
    break;
  }

 });

});
  /*
  En caso de editar
  */
  function boton_editar(productoid, nombre_insumo){

    //realizo los pasos para ingresar el insumo
    //var productoid = $(this).data('productoid');
    //Llamo los datos del formulario con el insimoid
    $.ajax({
      url:'mostrar_datos_insumo.php',
      type:'post',
      data:'productoid='+productoid,
      success:function(respuesta){
        //agrego el formulario al modal
        $('#modal_editar_insumo div[class=modal-body]').html(respuesta);

        //coloco el focus en el primer input
    $('#modal_editar_insumo').on('shown.bs.modal',(function(){
      $('#modal_editar_insumo form input[name=nombre_insumo]').focus();
    }));
      }
    });
    //$('#modal_egresar_insumo form input[type=number]').attr('max',cantidad_disponible);
    $('#modal_editar_insumo h4 span').html(nombre_insumo);
    $('#modal_editar_insumo input[type=hidden]').val(productoid);
    $('#modal_editar_insumo').modal('show');

  }
</script>
<table class="table table-striped table-hover">
<thead>
<tr>
	<th>Código</th>
	<th>Descripción</th>
	<th>Marca</th>
  <th>Presentación</th>
  <th>Existencia</th>
	<th>Acción</th>
</tr>
</thead>
<tbody>
<?php 

foreach ($insumos as $llave => $dato) {
  //determinar el total de la cantidad de insumos
  $db = new DB();
  $consulta_cantidad = $db->rawQuery('SELECT sum(cantidad) as cantidad_total FROM lote WHERE productoid = '.$dato['productoid'].' AND flag_eliminado=0');
  $cantidad_total = $consulta_cantidad[0]['cantidad_total'];
  if (empty($cantidad_total)) {
    $cantidad_total = 0;
  }
	?>
<tr>
	<td><?php echo($dato['codigo']); ?></td>
	<td><?php echo($dato['descripcion']); ?></td>
	<td><?php echo($dato['marca']); ?></td>
  <td><?php echo($dato['presentacion']); ?></td>
  <td><strong><?php echo $cantidad_total; ?></strong></td>
	<td>
    <!--
		<button data-titulo="Ingresar insumo" name="ingresar" type="button" class="btn btn-primary btn-sm" data-nombre-insumo="<?php echo($dato['descripcion']); ?>" data-insumoid="<?php print($dato['productoid']); ?>"><i class="fa fa-arrow-circle-down"></i></button>
		<button data-titulo="Egresar insumo" name="egresar" type="button" class="btn btn-primary btn-sm" data-cantidad-disponible="<?php echo(0); ?>" data-nombre-insumo="<?php echo($dato['descripcion']); ?>" data-insumoid="<?php print($dato['productoid']); ?>"><i class="fa fa-arrow-circle-up"></i></button>
    <button data-titulo="Editar insumo" name="editar" type="button" class="btn btn-warning btn-sm" data-cantidad-disponible="<?php echo(0); ?>" data-nombre-insumo="<?php echo($dato['descripcion']); ?>" data-insumoid="<?php print($dato['productoid']); ?>"><i class="fa fa-pencil-square-o"></i></button>
    <button data-titulo="Borrar insumo" name="borrar" type="button" class="btn btn-danger btn-sm" data-cantidad-disponible="<?php echo(0); ?>" data-nombre-insumo="<?php echo($dato['descripcion']); ?>" data-insumoid="<?php print($dato['productoid']); ?>"><i class="fa fa-trash"></i></button>
    -->
    <a href="index.php?ir=verinsumo&productoid=<?php print($dato['productoid']); ?>" class="btn btn-primary btn-sm">Detalles</a>
    <button data-titulo="Editar insumo" name="editar" type="button" class="btn btn-warning btn-sm" data-nombre-insumo="<?php echo($dato['descripcion']); ?>" data-productoid="<?php print($dato['productoid']); ?>"><i class="fa fa-pencil-square-o"></i></button>
    <button data-titulo="Borrar insumo" name="borrar" type="button" class="btn btn-danger btn-sm" data-nombre-insumo="<?php echo($dato['descripcion']); ?>" data-productoid="<?php print($dato['productoid']); ?>"><i class="fa fa-trash"></i></button>
	</td>
</tr>	
	<?php
}

 ?>
</tbody>
</table>
<!-- js toolp -->
<script type="text/javascript">

$(document).ready(function(){
  $('table button').hover(function(e){
    var titulo = $(this).data('titulo');
    $(this).tooltip({
      title:titulo
    });
    $(this).tooltip('show');
  });
});

</script>



    </div><!-- /.container -->

<!-- Modal para Ingresar insumo -->
<div id="modal_ingresar_insumo" class="modal fade bs-example-modal-sm">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-arrow-circle-down"></i> Ingresar insumo: <span id="nombre_insumo_titulo"></span></h4>
      </div>
      <form method="post" action="ingresar_insumo.php">
      <div class="modal-body">
          <input type="hidden" name="insumoid">
          <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input id="cantidad" type="number" min="1" name="cantidad_ingresar" class="form-control" required>
          </div>
          <div class="form-group">
            <div class="form-inline">
            <label for="lote">Código de lote</label>
            <select name="lote" class="form-control" required>
              <!-- Aqui cargo los lotes existentes -->

            </select>
            <button class="btn btn-primary" id="boton_agregar_lote">Agregar</button>
            </div>
          </div>
          <script type="text/javascript">
          $('#boton_agregar_lote').click(function(){
            alert('click en el boton');
          });
          </script>
          <div class="form-group">
            <label for="fecha_vencimiento">Fecha de vencimiento</label>
            <input disabled type="date" id="fecha_vencimiento" name="fecha_vencimiento" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="fecha_compra">Fecha de compra</label>
            <input disabled type="date" id="fecha_compra" name="fecha_compra" class="form-control" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
      </div>
      </form>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal para Egresar -->
<div id="modal_egresar_insumo" class="modal fade bs-example-modal-sm">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Egresar insumo: <span></span></h4>
      </div>
      <form method="post" action="egresar_insumo.php">
        <input type="hidden" name="insumoid">
      <div class="modal-body">

          <div class="form-group">
            <label for="cantidad_egresar">Cantidad</label>
            <input type="number" min="1" max="0" id="cantidad_egresar" name="cantidad_egresar" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="egresar_destino">Destino</label>
            <input id="egresar_destino" name="egresar_destino" class="form-control" autocomplete="off" required>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Guardar</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php 
include('incluir/mdl_borrar_insumo.php');
include('incluir/mdl_editar_insumo.php');
 ?>