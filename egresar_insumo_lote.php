<?php

include('incluir/DB.php');

if(isset($_POST['loteid']) && !empty($_POST['loteid']) && isset($_POST['cantidad_egresar']) && !empty($_POST['cantidad_egresar'])){
	$db = new DB();
	$db->where('loteid',$_POST['loteid']);
	$datos = $db->getOne('lote');
	$cantidad_disponible = $datos['cantidad'];
	//$ubicacion = $datos['ubicacion'];
	$nuevacantidad = $cantidad_disponible - $_POST['cantidad_egresar'];
	if($nuevacantidad < 0){
		print('sobrepasa el limite.');
	}else{
	$datos_actualizar = array('cantidad'=>$nuevacantidad);
	$db->where('loteid',$_POST['loteid']);
	$db->update('lote',$datos_actualizar);

	if ($nuevacantidad == 0) {
	$datos = array('flag_eliminado'=>1,'motivo_eliminado'=>'Finalizado','fecha_eliminado'=>$db->now());
	$db->where('loteid',$_POST['loteid']);
	$eliminar_lote = $db->update('lote',$datos);
	}

	//registro la informacion en transaccion
	/*
	$datos_egreso = array(
		'tipo'=>'egreso',
		'insumoid'=>$_POST['insumoid'],
		'fecha'=>$db->now(),
		'cantidad'=>$_POST['cantidad_egresar'],
		'ubicacion'=>$ubicacion,
		'destino'=>$_POST['egresar_destino']
		);
	$db->insert('transaccion',$datos_egreso);
	*/
	header('location: '.$_SERVER[HTTP_REFERER]);
	}
}else{
	header('location: index.php');
}

 ?>