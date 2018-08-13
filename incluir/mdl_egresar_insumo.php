<!-- Modal para Egresar insumo -->
<div id="mdl_egresar_insumo" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Egresar: <span></span></h4>
      </div>
      <form method="post" action="egresar_insumo_lote.php">
        <input type="hidden" name="loteid">
      <div class="modal-body">

          <div class="form-group">
            <label for="cantidad_egresar">Cantidad</label>
            <input type="number" min="1" max="0" id="cantidad_egresar" name="cantidad_egresar" class="form-control" required>
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