<?php
if (empty($_POST["txtPromocion"]) || empty($_POST["txtDuracion"])) {
    header('Location: index.php');
    exit();
}

include_once 'model/conexion.php';
$promocion = $_POST["txtPromocion"];
$duracion = $_POST["txtDuracion"];
$codigo = $_POST["codigo"];

$sentencia = $bd->prepare("INSERT INTO promociones(promocion,duracion,id_persona) VALUES (?,?,?);");
$resultado = $sentencia->execute([$promocion,$duracion, $codigo]);

if ($resultado === TRUE) {
    $id_promocion = $bd->lastInsertId();
    header('Location: agregarPromocion.php?codigo='.$codigo.'&id_promocion='.$id_promocion);
} else {
    header('Location: index.php');
    exit();
} 
