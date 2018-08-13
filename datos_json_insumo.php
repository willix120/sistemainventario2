<?php 
include_once('incluir/DB.php');
$salida = json_encode($_GET['insumoid']);
print($salida);
/*
if (isset($_GET['insumoid']) && !empty($_GET['insumoid'])) {
	$db = new DB();
	$db->where('insumoid',$_POST['insumoid']);
	$datos = $db->getOne('insumoid');
	$json = array(
		'insumoid'=>$datos['insumoid'],
		'cantidad'=>$datos['cantidad'],
		'nombre'=>$datos['nombre']
		);
	$json_codificado = json_encode($json);
	echo $json_codificado;
}else{
	header('location: index.php');
}
*/


 ?>