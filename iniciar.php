<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Sistema">
    <meta name="author" content="W y A">
    <link rel="icon" href="img/logo.png">

    <title>Ingresar al Sistema</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/ingresar.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

  </head>

  <body>

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
      <form class="form-signin" method="post" action="ingresarsistema.php">
        <h3 class="form-signin-heading"><img src="img/logo.png" alt="sisinventario">Sistema Inventario</h3>
        <label for="inputEmail" class="sr-only">Clave</label>
        <input type="password" id="ingresar_clave" name="clave" class="form-control" placeholder="Clave de acceso" required autofocus>
        <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="fa fa-sign-in"></i> Ingresar</button>
      </form>

    </div>
  </body>
</html>