<div class="container">
<h3 class="page-header"><i class="fa fa-plus-circle"></i> Registrar insumo</h3>

<form method="post" action="registrar_nuevo_insumo.php">

<div class="form-group">
<label for="codigo">Código</label>
<input type="text" name="codigo" id="codigo" class="form-control" autocomplete="off" required autofocus>
</div>


<div class="form-group">
<label for="descripcion">Descripción</label>
<input type="text" name="descripcion" id="descripcion" class="form-control" autocomplete="off" required>
</div>


<div class="form-group">
<label for="marca">Marca</label>
<input type="text" name="marca" id="marca" class="form-control" autocomplete="on" required>
</div>


<div class="form-group">
<label for="presentacion">Presentación</label>
<input type="text" name="presentacion" id="presentacion" class="form-control" required autocomplete="on">
</div>
<!--
<div class="form-group">
<label for="destino_insumo">Destino</label>
<input type="text" name="destino_insumo" id="destino_insumo" class="form-control">
</div>
-->

<div class="form-group">
<button class="btn btn-primary" type="submit"><i class="fa fa-floppy-o"></i> Guardar</button>
</div>

</form>


</div>