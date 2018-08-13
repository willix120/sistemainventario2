<?php 
session_start();

if (isset($_SESSION['operador'])) {
	if (isset($_POST['codigo']) && !empty($_POST['codigo'])
		&&
		isset($_POST['descripcion']) && !empty($_POST['descripcion'])
		&&
		isset($_POST['marca']) && !empty($_POST['marca'])
		&&
		isset($_POST['presentacion']) && !empty($_POST['presentacion'])
		) {

	require_once('incluir/DB.php');
	$db = new DB();
	$datos = array(
		'codigo'=>$_POST['codigo'],
		'descripcion'=>$_POST['descripcion'],
		'marca'=>$_POST['marca'],
		'presentacion'=>$_POST['presentacion'],
		'fecha_registro'=>$db->now()
		);
	if($db->insert('producto',$datos)){
		$_SESSION['mensaje']=array('tipo'=>1,'titulo'=>'Registro exitoso','mensaje'=>'Nuevo insumo registrado.');
		header('location: index.php');
	}
}
}else{
	header('location: index.php');
}

 ?>