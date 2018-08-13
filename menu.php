<?php 
class menu{
	var $opciones;

	function mostrar(){
		?>
		<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--
          <a class="navbar-brand" href="index.php">SisInventario</a>
        -->
            <a class="navbar-brand" rel="home" href="index.php" title="Sistema para la gestión de inventario"><span style="margin-left:65px; color:#ffffff;">Inventario</span>
    </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <!--
            <li class="active"><a href="#">Home</a></li>
            -->
<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-medkit"></i> Insumos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php?ir=nuevoinsumo"><i class="fa fa-plus-circle"></i> Nuevo insumo</a></li>
            <!--
            <li><a href="index.php?ir=nuevoegreso">Egreso</a></li>
            -->
          </ul>
        </li>
<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file-text-o"></i> Reportes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <!--
            <li><a href="reporte.php"><i class="fa fa-clipboard"></i> General</a></li>
            -->
            <li><a href="index.php?ir=transacciones"><i class="fa fa-exchange"></i> Transacciones</a></li>
          </ul>
        </li>
            
          </ul>
          <ul class="nav navbar-nav pull-right">
            <li><a href="index.php?ir=configuracion"><i class="fa fa-cogs"></i> Configuración</a></li>
<li><a href="salir.php"><i class="fa fa-sign-out"></i> Salir</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
		<?php
	}
}


 ?>