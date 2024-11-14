<?php
// Incluir la conexión a la base de datos
include("C:/xampp/htdocs/EncuentraTec/modelo/conexion_BD.php");

// Iniciar la sesión

// Verificar si se han enviado los datos del formulario
if (isset($_POST['rol'], $_POST['identificador'], $_POST['password'])) {
    $rol = $_POST['rol'];
    $identificador = trim($_POST['identificador']);
    $password = trim($_POST['password']);

    // Inicializar variables para mensajes de error
    $mensajeError = '';

    if ($rol === 'alumno') {
        // Primero, verificar si el usuario existe
        $sqlUsuario = $conexion->prepare("SELECT password FROM alumno WHERE numero_control = ?");
        $sqlUsuario->bind_param("s", $identificador);
        $sqlUsuario->execute();
        $resultadoUsuario = $sqlUsuario->get_result();

        if ($resultadoUsuario->num_rows > 0) {
            // El usuario existe, ahora verificar la contraseña
            $row = $resultadoUsuario->fetch_assoc();
            if ($row['password'] === $password) {
                // Contraseña correcta, iniciar sesión
                $_SESSION['usuario'] = $identificador;
                $_SESSION['rol'] = $rol;
                header("Location: ../inicioPublicaciones.php");
                exit();
            } else {
                // Contraseña incorrecta
                $mensajeError = "Contraseña incorrecta.";
            }
        } else {
            // Usuario no encontrado
            $mensajeError = "Número de control no encontrado.";
        }
        $sqlUsuario->close();
    } elseif ($rol === 'administrador') {
        // Primero, verificar si el administrador existe
        $sqlUsuario = $conexion->prepare("SELECT passwordAdmin FROM administrador WHERE correoAdmin = ?");
        $sqlUsuario->bind_param("s", $identificador);
        $sqlUsuario->execute();
        $resultadoUsuario = $sqlUsuario->get_result();

        if ($resultadoUsuario->num_rows > 0) {
            // El administrador existe, ahora verificar la contraseña
            $row = $resultadoUsuario->fetch_assoc();
            if ($row['passwordAdmin'] === $password) {
                // Contraseña correcta, iniciar sesión
                $_SESSION['usuario'] = $identificador;
                $_SESSION['rol'] = $rol;
                header("Location: ../vistaAdministrador.php");
                exit();
            } else {
                // Contraseña incorrecta
                $mensajeError = "Contraseña incorrecta.";
            }
        } else {
            // Administrador no encontrado
            $mensajeError = "Correo de administrador no encontrado.";
        }
        $sqlUsuario->close();
    } else {
        // Rol no reconocido
        $mensajeError = "Rol de usuario no válido.";
    }

    // Si hubo un error, mostrar el mensaje con estilo
    if (!empty($mensajeError)) {
        echo '<div class="alerta">' . htmlspecialchars($mensajeError) . '</div>';
    }
} else {
    echo '<div class="alerta">Por favor, complete todos los campos</div>';
}

// Cerrar la conexión a la base de datos

?>

