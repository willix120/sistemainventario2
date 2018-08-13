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
},
ordering:  false
    });
});
</script>
<div class="row-fluid">
  <div class="container">
<?php 
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

 ?>
<?php 
include_once('incluir/DB.php');
$db = new DB();
$db->where('productoid',$_GET['productoid']);
$producto = $db->getOne('producto');

 ?>
<h3 class="page-header"><i class="fa fa-medkit"></i> <?php print($producto['descripcion']); ?> <small><?php print($producto['marca']); ?> - <?php print($producto['presentacion']); ?></small> <span class="badge"><?php print($producto['codigo']); ?></span> <button class="btn btn-primary" data-toggle="modal" data-target="#mdl_nuevo_lote">Agregar</button></h3>
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
		var loteid = $(this).data('loteid');
    //$('#nombre_insumo_titulo').html($(this).data('nombre-insumo'));
    $('#modal_ingresar_insumo input[type=hidden]').val(loteid);
		$('#modal_ingresar_insumo').modal('show');
	});
	/*
	En caso de ser egreso
	*/
	$('button[name=egresar]').click(function(boton){
    //focus en el primer input
    $('#mdl_egresar_insumo').on('shown.bs.modal',(function(){
      $('#mdl_egresar_insumo form input[name=cantidad_egresar]').focus();
    }));
		//realizo los pasos para ingresar el insumo
    var cantidad_disponible = $(this).data('cantidad-disponible');
		var loteid = $(this).data('loteid');
    $('#mdl_egresar_insumo form input[type=number]').val(1);
    $('#mdl_egresar_insumo form input[type=number]').attr('max',cantidad_disponible);
    $('#mdl_egresar_insumo h4 span').html($(this).data('nombre-insumo'));
    $('#mdl_egresar_insumo input[type=hidden]').val(loteid);
		$('#mdl_egresar_insumo').modal('show');
	});

  /*
  En caso de borrar
  */
  $('button[name=borrar]').click(function(boton){
    //realizo los pasos para ingresar el insumo
    //var cantidad_disponible = $(boton.target).data('cantidad-disponible');
    var loteid = $(this).data('loteid');
    //$('#modal_egresar_insumo form input[type=number]').attr('max',cantidad_disponible);
    //$('#modal_borrar_insumo h4 span').html($(this).data('nombre-insumo'));
    $('#mdl_eliminar_lote input[type=hidden]').val(loteid);
    $('#mdl_eliminar_lote').modal('show');
  });


  /*
  En caso de editar
  */
  $('button[name=editar]').click(function(boton){
    //realizo los pasos para ingresar el insumo
    //var cantidad_disponible = $(boton.target).data('cantidad-disponible');
    var loteid = $(this).data('loteid');
    //Llamo los datos del formulario con el insimoid

    $.ajax({
      url:'mostrar_datos_lote.php',
      type:'post',
      data:'loteid='+loteid,
      success:function(respuesta){
        //agrego el formulario al modal
        $('#mdl_editar_lote div[class=modal-body]').html(respuesta);
        //coloco el focus en el primer input
    
    $('#mdl_editar_lote').on('shown.bs.modal',(function(){
      $('#mdl_editar_lote form input[name=nombre_insumo]').focus();
    }));

      }
    });
    //$('#modal_egresar_insumo form input[type=number]').attr('max',cantidad_disponible);
    //$('#modal_editar_insumo h4 span').html($(this).data('nombre-insumo'));
    $('#mdl_editar_lote input[type=hidden]').val(loteid);
    $('#mdl_editar_lote').modal('show');
  });
});
</script>
<?php
//busco los lotes del producto por el productoid
$db2 = new DB();
//$db2->where('productoid',$_GET['productoid']);
//$db2->orderBy("fecha_vencimiento","asc");
//$db2->where('flag_eliminado',0);
//$lotes = $db2->get('lote');
$lotes = $db2->rawQuery('SELECT * FROM lote WHERE productoid='.$_GET['productoid'].' AND flag_eliminado=0 ORDER BY fecha_vencimiento');
?>
<table class="table table-striped table-hover">
<thead>
<tr>
	<th>Código</th>
	<th>Cantidad</th>
	<th>Fecha de vencimiento</th>
	<th>Acción</th>
</tr>
</thead>
<tbody>
<?php
//para las fechas en español
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

foreach ($lotes as $llave => $dato) {
	//$nueva_fecha = new DateTime($dato['fecha_vencimiento']);
  $nueva_fecha = explode('-', $dato['fecha_vencimiento']);
  $mes = (int)$nueva_fecha[1]-1;
  if($mes<0){
    $mes = 0;
  }
?>
<tr>
	<td><?php print(str_pad($dato['codigo'], 3, "0", STR_PAD_LEFT)); ?></td>
	<td><?php print($dato['cantidad']); ?></td>
	<td><?php print($meses[$mes].' '.$nueva_fecha[0]); ?></td>
	<td>
    <button data-titulo="Ingresar insumo" name="ingresar" type="button" class="btn btn-primary btn-sm" data-loteid="<?php print($dato['loteid']); ?>"><i class="fa fa-arrow-circle-down"></i></button>
    <button data-titulo="Egresar insumo" name="egresar" type="button" class="btn btn-primary btn-sm" data-cantidad-disponible="<?php echo $dato['cantidad']; ?>" data-nombre-insumo="<?php echo($producto['descripcion']); ?>" data-loteid="<?php print($dato['loteid']); ?>"><i class="fa fa-arrow-circle-up"></i></button>
    <button data-titulo="Editar lote" name="editar" type="button" class="btn btn-warning btn-sm" data-loteid="<?php print($dato['loteid']); ?>"><i class="fa fa-pencil-square-o"></i></button>
    <button data-titulo="Eliminar lote" name="borrar" type="button" class="btn btn-danger btn-sm" data-loteid="<?php print($dato['loteid']); ?>"><i class="fa fa-trash"></i></button>
  </td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
</div>

<?php
//agrego el modal de registrar nuevo lote
include('mdl_registrar_lote.php');
//modal eliminar lote
include('mdl_eliminar_lote.php');
//modal editar lote
include('mdl_editar_lote.php');
//modal egresar insumo de lote
include('mdl_egresar_insumo.php');
//modal para ingresar un insumo a un lote
include('mdl_ingresar_insumo.php');
 ?>