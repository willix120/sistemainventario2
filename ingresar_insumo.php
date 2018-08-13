<?php 
include('incluir/DB.php');

if(isset($_POST['insumoid']) && !empty($_POST['insumoid']) && isset($_POST['cantidad_ingresar']) && !empty($_POST['cantidad_ingresar'])){
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
	header('location: index.php');
}else{
	header('location: index.php');
}


 ?>