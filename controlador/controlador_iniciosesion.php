<?php
include("C:/xampp/htdocs/EncuentraTec/modelo/conexion_BD.php");

if (!empty($_POST["login"])) {
    $rol = $_POST["rol"] ?? '';
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    if ($rol && $username && $password) {
        if ($rol === 'alumno') {
            // Consulta para alumno
            $stmt = $conexion->prepare("SELECT * FROM alumno WHERE num_control = ? AND password = ?");
            $stmt->bind_param("ss", $username, $password);
        } elseif ($rol === 'administrador') {
            // Consulta para administrador
            $stmt = $conexion->prepare("SELECT * FROM administrador WHERE correo = ? AND password = ?");
            $stmt->bind_param("ss", $username, $password);
        } else {
            echo '<div class="alerta">Rol no válido</div>';
            exit;
        }

        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            // Redirección según el rol
            header("Location: " . ($rol === 'alumno' ? "inicioPublicaciones.php" : "publicacionesAdmi.html"));
            exit;
        } else {
            echo '<div class="alerta">Usuario o contraseña incorrectos</div>';
        }

        $stmt->close();
    } else {
        echo '<div class="alerta">Por favor, completa todos los campos</div>';
    }
}
?>