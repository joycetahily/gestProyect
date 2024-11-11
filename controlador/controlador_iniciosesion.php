<?php
include("C:/xampp/htdocs/EncuentraTec/modelo/conexion_BD.php");

session_start();

if (isset($_POST['rol'], $_POST['identificador'], $_POST['password'])) {
    $rol = $_POST['rol'];
    $identificador = $_POST['identificador'];
    $password = $_POST['password'];

    if ($rol === 'alumno') {
        $sql = $conexion->prepare("SELECT * FROM alumno WHERE numero_control = ? AND password = ?");
        $sql->bind_param("ss", $identificador, $password);
    } elseif ($rol === 'administrador') {
        $sql = $conexion->prepare("SELECT * FROM administrador WHERE correoAdmin = ? AND passwordAdmin = ?");
        $sql->bind_param("ss", $identificador, $password);
    }

    $sql->execute();
    $resultado = $sql->get_result();

    if ($resultado->num_rows > 0) {
        $_SESSION['usuario'] = $identificador;
        $_SESSION['rol'] = $rol;

        if ($rol === 'alumno') {
            header("Location: ../inicioPublicaciones.php");
        } else {
            header("Location: ../publicacionesAdmi.php");
        }
        exit();
    } else {
        echo '<div class="alerta">Usuario o contraseña incorrectos</div>';
    }
} else {
    echo '<div class="alerta">Por favor, complete todos los campos</div>';
}
?>