<?php
session_start();
?>
<html>

<head>
    <link rel="icon" href="img/icono.ico">
    <title>BIENVENIDO</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <?php
    include('../config/serv.php');
    if (isset($_POST['login'])) {
        $entro = false;
        $usuario = $_POST['usuario'];
        $pw = $_POST['clave'];
        $registros = "SELECT usuario FROM usuario WHERE usuario ='$usuario' AND clave='$pw'";
        foreach ($db->query($registros) as $fila) {
            session_start();
            $_SESSION["usuario"] = $fila['usuario'];
            echo '<script>alert("Bienvenido '.$usuario.'"); </script>';
            echo '<script>window.location="../views/pages/index.php"; </script>';
        }
        $db = null;
        if (!$entro) {
            echo '<script>alert("Usuario incorrecto"); </script>';
            echo '<script>window.location="../views/pages/inicio.php"; </script>';
        }
    }
    if (isset($_POST['terminar'])) {
        echo '<script>window.location="../views/pages/inicio.php"; </script>';
    }
    ?>
</body>

</html>