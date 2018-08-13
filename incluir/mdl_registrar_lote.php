
<!-- JS modal registrar nuevo lote -->
<script type="text/javascript">
$(document).ready(function(){

});
</script>

<!-- JS funcion para saber el codigo asignado -->
<script type="text/javascript">
$(document).ready(function(){

	var solo_lectura = true;
	$('#asignar_codigo').click(function(){
		if(solo_lectura){
		//quito el readonly al input de id codigo
		$('#codigo').prop('readonly',false);
		solo_lectura = false;
	}else{
		$('#codigo').prop('readonly',true);
		solo_lectura = true;
	}
	});

	$('#mdl_nuevo_lote').on('show.bs.modal',function(){
		//por defecto un 1 en el input
		$('#cantidad').val(1);
		//cargo el codigo correspondiente
		$.ajax({
			url:'codigo_lote.php',
			type:'post',
			data:'productoid=<?php echo $producto['productoid']; ?>',
			success:function(rsp){
				$('#codigo').val(rsp);
			}
		});
	});
});
</script>

<!-- Modal para registrar un nuevo lote -->
<div id="mdl_nuevo_lote" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-arrow-circle-down"></i> Registrar nuevo lote</h4>
      </div>
      <form method="post" action="agregar_lote.php">
      <div class="modal-body">
          <input type="hidden" name="productoid" value="<?php echo $_GET['productoid']; ?>">
          <div class="form-group">
            <label for="codigo">Código de lote <small>Asignar manualmente <input id="asignar_codigo" type="checkbox"></small></label>
            <input readonly type="text" class="form-control" id="codigo" name="codigo" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input id="cantidad" type="number" min="1" name="cantidad" class="form-control" required autofocus>
          </div>
          <div class="form-group">
            <label for="fecha_vencimiento">Fecha de vencimiento</label>
            <input type="month" id="fecha_vencimiento" name="fecha_vencimiento" class="form-control" required>
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