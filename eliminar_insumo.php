<?php 
include('incluir/DB.php');

if(isset($_POST['insumoid']) && !empty($_POST['insumoid'])){
	$db = new DB();
	print($_POST['insumoid']);
}else{
	header('location: index.php');
}

 ?>