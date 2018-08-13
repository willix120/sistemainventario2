<?php 
include('incluir/DB.php');

$db = new DB();
$datos = array('flag_eliminado'=>1,'motivo_eliminado'=>$_POST['motivo'],'fecha_eliminado'=>$db->now());
$db->where('loteid',$_POST['loteid']);
$eliminar_lote = $db->update('lote',$datos);
if ($eliminar_lote) {
	#reenvio a la pag
	header('location:'.$_SERVER[HTTP_REFERER]);
}else{
	print('ha ocurrido un error.');
}

 ?>