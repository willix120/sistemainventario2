<?php 
include('incluir/DB.php');

if(isset($_POST['insumoid']) && !empty($_POST['insumoid']) && isset($_POST['cantidad_egresar']) && !empty($_POST['cantidad_egresar']) && isset($_POST['egresar_destino']) && !empty($_POST['egresar_destino'])){
	$db = new DB();
	$db->where('insumoid',$_POST['insumoid']);
	$datos = $db->getOne('insumo');
	$cantidad_disponible = $datos['cantidad'];
	$ubicacion = $datos['ubicacion'];
	$nuevacantidad = $cantidad_disponible - $_POST['cantidad_egresar'];
	if($nuevacantidad < 0){
		print('sobrepasa el limite.');
	}else{
	$datos_actualizar = array('cantidad'=>$nuevacantidad);
	$db->where('insumoid',$_POST['insumoid']);
	$db->update('insumo',$datos_actualizar);

	//registro la informacion en transaccion
	$datos_egreso = array(
		'tipo'=>'egreso',
		'insumoid'=>$_POST['insumoid'],
		'fecha'=>$db->now(),
		'cantidad'=>$_POST['cantidad_egresar'],
		'ubicacion'=>$ubicacion,
		'destino'=>$_POST['egresar_destino']
		);
	$db->insert('transaccion',$datos_egreso);

	header('location: index.php');
	}
}else{
	header('location: index.php');
}

 ?>