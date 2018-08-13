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
<div class="row">
<div class="col-xs-12">
<h3 class="page-header">Configuración</h3>
<h4>Cambiar clave de acceso</h4>
<form action="cambiar_clave.php" method="post">
<div class="form-group">
<label for="clave_actual">Clave Actual</label>
<input id="clave_actual" name="clave_actual" type="password" class="form-control" required autofocus>
</div>
<div class="form-group">
<label for="clave_nueva">Clave Nueva</label>
<input id="clave_nueva" name="clave_nueva" type="password" class="form-control" required>
</div>
<div class="form-group">
<label for="clave_nueva2">Reescribe la clave nueva</label>
<input id="clave_nueva2" name="clave_nueva2" type="password" class="form-control" required>
</div>
<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button>
</form>
</div>
</div>
</div>