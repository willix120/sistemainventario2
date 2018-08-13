<?php
session_start();
include_once('menu.php');
include_once('pagina.php');


if (!isset($_SESSION['operador'])) {
    include('iniciar.php');
}else{

$pagina = new pagina();
$pagina->setTitulo('Inventario');
$pagina->mostrar();

}

 ?>