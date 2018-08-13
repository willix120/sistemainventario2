<?php
include_once('incluir/DB.php');
if (isset($_POST['loteid']) && !empty($_POST['loteid'])) {
	$db = new DB();
	$db->where('loteid',$_POST['loteid']);
	$salida = $db->getOne('lote');
	$fecha = new DateTime($salida['fecha_vencimiento']);
	?>
<input type="hidden" name="loteid" value="<?php print($_POST['loteid']); ?>">

<div class="form-group">
<label for="codigo">Código de lote</label>
<input readonly value="<?php print($salida['codigo']); ?>" type="text" name="codigo" id="codigo" class="form-control" autocomplete="off" required>
</div>
<div class="form-group">
<label for="cantidad">Cantidad</label>
<input value="<?php print($salida['cantidad']); ?>" type="number" name="cantidad" id="cantidad" class="form-control" autocomplete="off" required>
</div>
<div class="form-group">
  <label for="fecha_vencimiento">Fecha de vencimiento</label>
  <input value="<?php print($fecha->format('Y-m')); ?>" type="month" id="fecha_vencimiento" name="fecha_vencimiento" class="form-control" required>
</div>

	<?php
}

 ?>