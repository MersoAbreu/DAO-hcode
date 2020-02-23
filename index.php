<?php




require_once("config.php");

$sql = new Sql();

$usuarios = $sql->SELECT("SELECT * FROM cliente");


echo json_encode($usuarios);







?>