<?php

include("../config/conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['cur_nom']) && !empty($_POST['cod_profesor'])) {
        $cur_nom = trim($_POST['cur_nom']);
        $cod_profesor = $_POST['cod_profesor'];

        $consulta = "INSERT INTO cursos (cur_nom, cod_profesor) 
                     VALUES ('$cur_nom', '$cod_profesor')";
        $resultado = mysqli_query($conex, $consulta);

        if ($resultado) {
            ?>
            <h3 class="success">Curso registrado exitosamente</h3>
            <?php
        } else {
            ?>
            <h3 class="error">Ocurrió un error al registrar el curso</h3>
            <?php
        }
    } else {
        ?>
        <h3 class="error">Por favor, completa todos los campos</h3>
        <?php
    }
}
?>