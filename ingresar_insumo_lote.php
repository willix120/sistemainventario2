<?php
if (isset($_POST['loteid']) && !empty($_POST['loteid'])
	&&
	isset($_POST['cantidad_ingresar']) && !empty($_POST['cantidad_ingresar'])) {
	require_once('incluir/DB.php');
	$db = new DB();

	$ingreso_lote_consulta = $db->rawQuery('UPDATE lote SET cantidad=cantidad+'.$_POST['cantidad_ingresar'].' WHERE loteid='.$_POST['loteid']);

		header('location: '.$_SERVER[HTTP_REFERER]);

}else{
	//En caso contrario vuelvo regreso
	header('location: '.$_SERVER[HTTP_REFERER]);
}
?>