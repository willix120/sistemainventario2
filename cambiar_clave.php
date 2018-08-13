<?php
session_start();
include_once('incluir/DB.php');

if (isset($_POST['clave_actual']) && !empty($_POST['clave_actual']) && 
	isset($_POST['clave_nueva']) && !empty($_POST['clave_nueva']) &&
	isset($_POST['clave_nueva2']) && !empty($_POST['clave_nueva2'])) {

	//chequeo si las claves nuevas coinciden
	if ($_POST['clave_nueva'] == $_POST['clave_nueva2']) {
		
		//chequeo si la clave vieja es correcta
		$db = new DB();
		$datos = $db->getOne('config');
		if ($datos['clave'] == $_POST['clave_actual']) {
			$db2 = new DB();
			$datos = array('clave'=>$_POST['clave_nueva']);
			$db2->update('config',$datos);
			$_SESSION['mensaje']=array('tipo'=>1,'mensaje'=>'Se ha cambiado la clave correctamente.','titulo'=>'Cambio de clave');
			//cambio de clave correctamente
		}else{
			$_SESSION['mensaje']=array('tipo'=>2,'mensaje'=>'La clave vieja ingresada no es correcta.','titulo'=>'Cambio de clave');
			//print('la clave vieja ingresada no es correcta.');

		}

	}else{
		$_SESSION['mensaje']=array('tipo'=>2,'mensaje'=>'Las claves no coinciden.','titulo'=>'Cambio de clave');
		//print('Las claves no coinciden.');

	}
}
header('location: index.php?ir=configuracion');
 ?>