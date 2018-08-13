<?php
include_once('incluir/DB.php'); 
if (isset($_POST['productoid']) && !empty($_POST['productoid'])) {
	$db = new DB();
	$db->where('productoid',$_POST['productoid']);
	$salida = $db->getOne('producto');
	?>
<input type="hidden" name="productoid" value="<?php print($_POST['productoid']); ?>">
<div class="form-group">
<label for="codigo">Código</label>
<input value="<?php echo $salida['codigo']; ?>" type="text" name="codigo" id="codigo" class="form-control" autocomplete="off" required autofocus>
</div>


<div class="form-group">
<label for="descripcion">Descripción</label>
<input value="<?php echo $salida['descripcion']; ?>" type="text" name="descripcion" id="descripcion" class="form-control" autocomplete="off" required>
</div>


<div class="form-group">
<label for="marca">Marca</label>
<input value="<?php echo $salida['marca']; ?>" type="text" name="marca" id="marca" class="form-control" autocomplete="on" required>
</div>


<div class="form-group">
<label for="presentacion">Presentación</label>
<input value="<?php echo $salida['presentacion']; ?>" type="text" name="presentacion" id="presentacion" class="form-control" required autocomplete="on">
</div>
	<?php
}
 ?>