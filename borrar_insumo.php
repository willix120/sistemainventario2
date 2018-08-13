<?php 
include('incluir/DB.php');

if(isset($_POST['productoid']) && !empty($_POST['productoid'])
	&&
	isset($_POST['motivo']) && !empty($_POST['motivo'])){
	$db = new DB();
	$datos_eliminar = array(
		'flag_eliminado'=>1,
		'motivo_eliminado'=>$_POST['motivo'],
		'fecha_eliminado'=>$db->now()
		);
	$db->where('productoid',$_POST['productoid']);
	$db->update('producto',$datos_eliminar);
	/*
	antiguas lineas de codigo
	$db->where('insumoid',$_POST['insumoid']);
	$borrar = $db->delete('insumo');
	*/
	session_start();
	$_SESSION['mensaje']=array('titulo'=>'Borrar insumo','mensaje'=>'Se ha borrado el insumo.');
	header('location: index.php');
}else{
	header('location: index.php');
}


 ?>