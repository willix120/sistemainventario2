<?php 
include('incluir/DB.php');
$db = new DB();
$salida = $db->rawQuery('SELECT count(loteid) as proximo_codigo FROM lote WHERE productoid='.$_POST['productoid']);
$proximo = $salida[0]['proximo_codigo']+1;
print(str_pad($proximo, 3, "0", STR_PAD_LEFT));
?>