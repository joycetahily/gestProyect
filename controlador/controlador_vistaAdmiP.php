<?php
// Inicia el almacenamiento en búfer para prevenir cualquier salida accidental
ob_start();

// Incluir la conexión a la base de datos
include("C:/xampp/htdocs/EncuentraTec/modelo/conexion_BD.php");

// Manejo de la eliminación antes de cualquier salida
if (isset($_GET['folio_acta'])) {
    // Escapa el parámetro para prevenir inyección SQL
    $folio_acta = mysqli_real_escape_string($conexion, $_GET['folio_acta']);

    // Consulta SQL para eliminar la publicación correspondiente al folio_acta
    $consultaEliminar = "DELETE FROM acta_objeto WHERE folio_acta = '$folio_acta'";

    // Ejecuta la consulta
    if (mysqli_query($conexion, $consultaEliminar)) {
        // Redirige a la página principal o de publicaciones con un mensaje de éxito
        //header("Location: ../vistaAdministrador.php");
        echo "<script>window.location.href = 'vistaAdministrador.php';</script>";
        // Asegura que el script termine aquí
        exit();
    } else {
        // En caso de error, muestra un mensaje de error
        echo "Error al eliminar la publicación: " . mysqli_error($conexion);
        // Termina el script para evitar continuar con la salida
        exit();
    }
}

// Ahora, realiza la consulta para mostrar las publicaciones
$consulta = "SELECT folio_acta, fecha, lugar, tipo, descripcion, foto, fecha_creacion, nombre FROM acta_objeto WHERE publicado = 1 ORDER BY fecha_creacion DESC";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    // Bucle para recorrer todas las filas
    while ($row = mysqli_fetch_assoc($resultado)) {
        // Convertimos la ruta de la imagen a relativa solo en esta iteración
        $rutaImagen = str_replace('C:/xampp/htdocs', '', $row['foto']);
        ?>
        <div class="post-container">
            <div class="post-image">
                <?php if ($rutaImagen) { ?>
                    <img src="<?php echo htmlspecialchars($rutaImagen); ?>" alt="Imagen del objeto" style="width: 100%; height: 100%; border-radius: 10px;">
                <?php } else { ?>
                    <span>Sin imagen</span>
                <?php } ?>
            </div>
            <div class="post-info">
                <div class="nombre-publico">
                    <span>Publicado por : <?php echo htmlspecialchars($row['nombre']); ?></span>
                </div>
                <div class="folio-acta">
                    <span>Folio: <?php echo htmlspecialchars($row['folio_acta']); ?></span>
                </div>
                <div class="fecha-creacion">
                    <span>Publicado el: <?php echo htmlspecialchars($row['fecha_creacion']); ?></span>
                </div>
                <div class="fecha-encuentro">
                    <span>Fecha de encuentro: <?php echo htmlspecialchars($row['fecha']); ?></span>
                </div>
                <div class="info-publi">
                    <span>Tipo de Objeto: <?php echo htmlspecialchars($row['tipo']); ?></span>
                    <span>Lugar: <?php echo htmlspecialchars($row['lugar']); ?></span>
                    <span>Descripción: <?php echo htmlspecialchars($row['descripcion']); ?></span>
                </div>
                <button class="delete-button" onclick="eliminarPublicacion(<?php echo htmlspecialchars($row['folio_acta']); ?>)">Eliminar</button>
            </div>
        </div>
        <?php
    }
} else {
    echo "<p>No hay publicaciones disponibles.</p>";
}

// Mensaje de éxito después de la redirección
if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'eliminado') {
    echo "<p>La publicación ha sido eliminada exitosamente.</p>";
}

// Finaliza el almacenamiento en búfer y envía la salida
ob_end_flush();
?>

<script>
    function eliminarPublicacion(folio_acta) {
        if (confirm("¿Estás seguro de que deseas eliminar esta publicación?")) {
            window.location.href = `vistaAdministrador.php?folio_acta=${folio_acta}`;
        }
    }
</script>
