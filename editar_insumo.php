<?php

include_once('incluir/DB.php');
if (isset($_POST['productoid']) && !empty($_POST['productoid']) &&
	isset($_POST['codigo']) && !empty($_POST['codigo']) &&
	isset($_POST['marca']) && !empty($_POST['marca']) &&
	isset($_POST['presentacion']) && !empty($_POST['presentacion'])
	) {

	$db = new DB();
	$db->where('productoid',$_POST['productoid']);
	$datos_editar = array(
		'codigo'=>$_POST['codigo'],
		'descripcion'=>$_POST['descripcion'],
		'marca'=>$_POST['marca'],
		'presentacion'=>$_POST['presentacion']
		);
	$db->update('producto',$datos_editar);
	header('location: index.php');

}else{
	header('location: index.php');
}

 ?>