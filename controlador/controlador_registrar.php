<?php
// Incluye la conexión a la base de datos
include("C:/xampp/htdocs/EncuentraTec/modelo/conexion_BD.php");

// Inicializa variables para almacenar los valores ingresados
$rol = isset($_POST["rol"]) ? $_POST["rol"] : '';
$num_control = isset($_POST["num_control"]) ? $_POST["num_control"] : '';
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : '';
$correo = isset($_POST["correo"]) ? $_POST["correo"] : '';
$password = isset($_POST["password"]) ? $_POST["password"] : '';

// Inicializa variable para almacenar mensajes de error o éxito
$mensaje = '';

if(!empty($_POST["registro"])) {
    // Variables comunes
    $rol = $_POST["rol"];
    $nombre = trim($_POST["nombre"]);
    $correo = trim($_POST["correo"]);
    $password = trim($_POST["password"]);

    // Validación de la contraseña
    if(strlen($password) < 8 || strlen($password) > 15) {
        $mensaje = '<div class="alerta">La contraseña debe tener entre 8 y 15 caracteres.</div>';
    } else {
        if ($rol === 'alumno') {
            $num_control = trim($_POST["num_control"]);

            // Validación del Número de Control
            if(!preg_match('/^\d{8}$/', $num_control)) {
                $mensaje = '<div class="alerta">El Número de Control debe tener exactamente 8 dígitos.</div>';
            } elseif($num_control < 19000000 || $num_control > 24999999) {
                $mensaje = '<div class="alerta">El Número de Control debe estar entre 19000000 y 24999999.</div>';
            } elseif(empty($nombre) || empty($correo)) {
                $mensaje = '<div class="alerta">Uno de los campos está vacío.</div>';
            } else {
                // Verificar si el número de control ya existe
                $stmt_check = $conexion->prepare("SELECT numero_control FROM alumno WHERE numero_control = ?");
                $stmt_check->bind_param("s", $num_control);
                $stmt_check->execute();
                $stmt_check->store_result();

                if($stmt_check->num_rows > 0) {
                    $mensaje = '<div class="alerta">El Número de Control ya está registrado.</div>';
                } else {
                    // Consulta preparada para registrar al alumno
                    $stmt = $conexion->prepare("INSERT INTO alumno (numero_control, nombre_com, correo_elec, password) VALUES (?, ?, ?, ?)");
                    // Elimina el hashing de la contraseña
                    //$hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $stmt->bind_param("ssss", $num_control, $nombre, $correo, $password);

                    if($stmt->execute()) {
                        $mensaje = '<div class="success">Alumno registrado correctamente. Redirigiendo...</div>';
                        echo "<script>setTimeout(() => { window.location.href = 'index.php'; }, 2000);</script>";
                        // Limpia las variables después del registro exitoso
                        $rol = $num_control = $nombre = $correo = $password = '';
                    } else {
                        $mensaje = '<div class="alerta">Error al registrar: ' . $stmt->error . '</div>';
                    }

                    $stmt->close();
                }

                $stmt_check->close();
            }
        } elseif ($rol === 'administrador') {
            // Para el administrador, no se requiere número de control
            if(empty($nombre) || empty($correo)) {
                $mensaje = '<div class="alerta">Uno de los campos está vacío.</div>';
            } else {
                // Verificar si el correo ya está registrado como administrador
                $stmt_check = $conexion->prepare("SELECT correoAdmin FROM administrador WHERE correoAdmin = ?");
                $stmt_check->bind_param("s", $correo);
                $stmt_check->execute();
                $stmt_check->store_result();

                if($stmt_check->num_rows > 0) {
                    $mensaje = '<div class="alerta">El correo electrónico ya está registrado como administrador.</div>';
                } else {
                    // Consulta preparada para registrar al administrador
                    $stmt = $conexion->prepare("INSERT INTO administrador (nombreAdmin, correoAdmin, passwordAdmin) VALUES (?, ?, ?)");
                    // Elimina el hashing de la contraseña
                    //$hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $stmt->bind_param("sss", $nombre, $correo, $password);

                    if($stmt->execute()) {
                        $mensaje = '<div class="success">Administrador registrado correctamente. Redirigiendo...</div>';
                        echo "<script>setTimeout(() => { window.location.href = 'index.php'; }, 2000);</script>";
                        // Limpia las variables después del registro exitoso
                        $rol = $nombre = $correo = $password = '';
                    } else {
                        $mensaje = '<div class="alerta">Error al registrar: ' . $stmt->error . '</div>';
                    }

                    $stmt->close();
                }

                $stmt_check->close();
            }
        } else {
            $mensaje = '<div class="alerta">Rol no válido seleccionado.</div>';
        }
    }

    $conexion->close();

    echo $mensaje;
}
?>
