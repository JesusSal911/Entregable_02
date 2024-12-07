<?php
// Conectarse a la BD
include_once("config/conexion.php");

if (isset($_GET['cod'])) {
    $cod_profesor = $_GET['cod'];

    // Preparar la consulta para eliminar el profesor
    $query = $bd->prepare("DELETE FROM profesores WHERE cod_profesor = :cod_profesor");
    $query->bindParam(':cod_profesor', $cod_profesor, PDO::PARAM_INT);

    if ($query->execute()) {
        header("Location: index.php?mensaje=Profesor eliminado correctamente");
        exit();
    } else {
        echo "Error al eliminar el profesor: " . implode(", ", $query->errorInfo());
    }
} else {
    echo "No se ha proporcionado un código de profesor.";
}
?>