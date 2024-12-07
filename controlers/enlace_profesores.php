<?php

include("../config/conexion.php");

if (isset($_POST['send'])) {

    if (
        strlen($_POST['prof_nom']) >= 1 &&
        strlen($_POST['dni']) >= 1 &&
        strlen($_POST['correo']) >= 1 &&
        strlen($_POST['telefono']) >= 1 &&
        strlen($_POST['edad']) >= 1 &&
        strlen($_POST['sexo']) >= 1
    ) {
        $prof_nom = trim($_POST['prof_nom']);
        $dni = trim($_POST['dni']);
        $correo = trim($_POST['correo']);
        $telefono = trim($_POST['telefono']);
        $edad = trim($_POST['edad']);
        $sexo = trim($_POST['sexo']);

        $consulta = "INSERT INTO profesores (prof_nom, dni, correo, telefono, edad, sexo)
                     VALUES ('$prof_nom', '$dni', '$correo', '$telefono', '$edad', '$sexo')";
        $resultado = mysqli_query($conex, $consulta);

        if ($resultado) {
            ?>
            <h3 class="success">Tu registro se ha completado</h3>
            <?php
        } else {
            ?>
            <h3 class="error">Ocurrió un error</h3>
            <?php
        }
    } else {
        ?>
        <h3 class="error">Llena todos los campos</h3>
        <?php
    }
}

?>
