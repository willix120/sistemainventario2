
<!-- Modal para Ingresar insumo -->
<!-- JS al cargar el modal -->
<script type="text/javascript">
$(document).ready(function(){
  $('#modal_ingresar_insumo input[name=cantidad_ingresar]').val(1);
});
</script>
<div id="modal_ingresar_insumo" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-arrow-circle-down"></i> Ingresar insumo</h4>
      </div>
      <form method="post" action="ingresar_insumo_lote.php">
      <div class="modal-body">
          <input type="hidden" name="loteid">
          <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input id="cantidad" type="number" min="1" name="cantidad_ingresar" class="form-control" required>
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