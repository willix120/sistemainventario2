<?php 
require_once('MysqliDb.php');

class DB extends MysqliDb{

	function __construct(){
		parent::__construct('localhost','root','','inventario');
	}

	function __destruct(){
		parent::__destruct();
	}

}

 ?>