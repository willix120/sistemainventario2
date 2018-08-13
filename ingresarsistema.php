<?php 
session_start();
include_once('incluir/DB.php');

if (isset($_POST['clave']) && !empty($_POST['clave'])) {

	$db = new DB();
	$clave = $db->getOne('config');
	if ($_POST['clave'] == $clave['clave']) {

	//creo la variable session
	$_SESSION['operador']=TRUE;
	header('location: index.php');
}else{
	$_SESSION['mensaje']=array('tipo'=>2,'titulo'=>'Datos incorrectos','mensaje'=>'Verifique la informacion enviada.');
	header('location: index.php');
}
}else{
	header('location: index.php');
}


 ?>