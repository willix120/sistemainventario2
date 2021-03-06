<!-- Modal para borrar -->
<div id="mdl_eliminar_lote" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-trash-o"></i> Eliminar lote</h4>
      </div>
      <form method="post" action="eliminar_lote.php">
      <div class="modal-body">
          <input type="hidden" name="loteid">
          <p><i class="fa fa-exclamation-triangle"></i> ¿Seguro que deseas eliminar este lote?</p>
          <label>Motivo</label>
          <textarea name="motivo" required class="form-control"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-trash-o"></i> Borrar</button>
      </div>
      </form>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->