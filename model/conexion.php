<?php 
$contrasena = "VgIMVOBQND3pAAtywUzJ";
$usuario = "root";
$nombre_bd = "railway";

try {
	$bd = new PDO (
		'mysql:host=containers-us-west-8.railway.app;port=5617;dbname='.$nombre_bd,
		$usuario,
		$contrasena,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
	);
} catch (Exception $e) {
	echo "Problema con la conexion: ".$e->getMessage();
}
?>
