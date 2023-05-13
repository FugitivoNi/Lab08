<?php
if (empty($_POST["txtPromocion"]) || empty($_POST["txtDuracion"])) {
    header('Location: index.php');
    exit();
}

include_once 'model/conexion.php';
$promocion = $_POST["txtPromocion"];
$duracion = $_POST["txtDuracion"];
$id_persona = $_POST["codigo"];

$sentencia = $bd->prepare("INSERT INTO promociones(promocion,duracion,id_persona) VALUES (?,?,?);");
$resultado = $sentencia->execute([$promocion,$duracion, $id_persona]);

if ($resultado === TRUE) {
    $id_promocion = $bd->lastInsertId();
    header('Location: agregarPromocion.php?codigo='.$id_persona.'&id_promocion='.$id_promocion);
} else {
    header('Location: index.php');
    exit();
} 

