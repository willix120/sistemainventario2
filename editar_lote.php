<?php
include('incluir/DB.php');
$db = new DB();
$db->where('loteid',$_POST['loteid']);
$fecha = new DateTime($_POST['fecha_vencimiento']);
$actualizar_datos = array(
	'fecha_vencimiento'=>$fecha->format('Y-m-d'),
	'cantidad'=>$_POST['cantidad']
	);
$salida = $db->update('lote',$actualizar_datos);
header('location: '.$_SERVER[HTTP_REFERER]);
 ?>