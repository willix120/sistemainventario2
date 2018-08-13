<?php 
include('incluir/DB.php');

if(isset($_POST['productoid']) && !empty($_POST['productoid'])
 && 
 isset($_POST['cantidad']) && !empty($_POST['cantidad'])
 &&
 isset($_POST['codigo']) && !empty($_POST['codigo'])
 &&
 isset($_POST['fecha_vencimiento']) && !empty($_POST['fecha_vencimiento'])
 ){
  	$fecha = new DateTime($_POST['fecha_vencimiento']);
 	$_POST['fecha_vencimiento'] = $fecha->format('Y-m-d');
 	$db = new DB();
 	$_POST['fecha_registro'] = date('Y-m-d');
 	$db->insert('lote',$_POST);
 	/*
	$db = new DB();
	$db->where('insumoid',$_POST['insumoid']);
	//Busco la cantidad actual
	$datos = $db->getOne('insumo');
	$cantidad_disponible = $datos['cantidad'];
	$ubicacion = $datos['ubicacion'];
	$nueva_cantidad=$cantidad_disponible+$_POST['cantidad_ingresar'];
	$datos_actualizar = array('cantidad'=>$nueva_cantidad);
	$db->where('insumoid',$_POST['insumoid']);
	$db->update('insumo',$datos_actualizar);

	//Ingreso la informacion en la tabla de transacciones.
	$datos_transaccion = array(
		'tipo'=>'ingreso',
		'insumoid'=>$_POST['insumoid'],
		'fecha'=>$db->now(),
		'cantidad'=>$_POST['cantidad_ingresar'],
		'ubicacion'=>$ubicacion,
		'destino'=>'Almacén'
		);
	$db->insert('transaccion',$datos_transaccion);
	*/
	header('location: index.php?ir=verinsumo&productoid='.$_POST['productoid']);
}else{
	header('location: index.php');
}


 ?>