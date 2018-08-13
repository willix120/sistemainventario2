<?php 

class pagina{
	var $titulo = 'Sistema Inventario';

	function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	function head(){
		?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Sistema para la gestión de inventario">
    <meta name="author" content="W y A">
    <link rel="icon" href="img/logo.png">

    <title><?php echo $this->titulo; ?></title>

    <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <!-- Custom styles for this template -->
    <script type="text/javascript" src="js/moment.min.js"></script>
    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="js/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="css/daterangepicker.css" />
<link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/estilo.css" rel="stylesheet">
    <style>
    .navbar-brand{
    float:left;
    height:50px;
    padding:15px 15px;
    font-size:18px;
    line-height:20px;
    background-image: url("img/logo.png");
    background-repeat: no-repeat;
    background-position: left center
}
    </style>

  </head>		
		<?php
	}

	function contenido($modulo){
		if (file_exists('incluir/'.$modulo.'.php')) {
			include('incluir/'.$modulo.'.php');
		}else{
			print('modulo no existe.');
		}
	}

	function body(){
		?>

  <body>
<?php 
$menu = new menu();
$menu->mostrar();



if (isset($_GET['ir'])) {
$ir = $_GET['ir'];
}

if (!empty($ir)) {
	$contenido = $ir;
}else{
	$contenido = 'principal';
}
$this->contenido($contenido);
 ?>
    



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="js/bootstrap.min.js"></script>
<!-- dataTables -->
<script src="js/jquery.dataTables.min.js"></script>
<!-- datatables 2 -->
<script src="js/dataTables.bootstrap.js"></script>
<link rel="stylesheet" href="css/dataTables.bootstrap.css">

 
  </body>
</html>
		<?php
	}

	function mostrar(){
		$this->head();
		$this->body();
	}
}


 ?>