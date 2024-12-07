<?php

include("../config/conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (
        !empty($_POST['alum_nom']) &&
        !empty($_POST['dni']) &&
        !empty($_POST['correo']) &&
        !empty($_POST['telefono']) &&
        !empty($_POST['edad']) &&
        !empty($_POST['sexo'])
    ) {
        $alum_nom = trim($_POST['alum_nom']);
        $dni = trim($_POST['dni']);
        $correo = trim($_POST['correo']);
        $telefono = trim($_POST['telefono']);
        $edad = trim($_POST['edad']);
        $sexo = trim($_POST['sexo']);

        // Insertar el alumno en la base de datos
        $consulta = "INSERT INTO alumnos (alum_nom, dni, correo, telefono, edad, sexo)
                    VALUES ('$alum_nom', '$dni', '$correo', '$telefono', '$edad', '$sexo')";
        $resultado = mysqli_query($conex, $consulta);

        if ($resultado) {
            ?>
            <script>
                alert("Alumno Registrado Correctamente");
            </script>
            <?php
        } else {
            ?>
            <h3 class="error">Ocurrió un error al registrar el alumno</h3>
            <?php
        }
    } else {
        ?>
        <h3 class="error">Por favor, completa todos los campos</h3>
        <?php
    }
}
?>