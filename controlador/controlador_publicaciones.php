<?php
$inc = include("C:/xampp/htdocs/EncuentraTec/modelo/conexion_BD.php");

if ($inc) {
    $consulta = "SELECT folio_acta, fecha, lugar, tipo, descripcion, foto, fecha_creacion, correo, nombre FROM acta_objeto WHERE publicado = 1 ORDER BY fecha_creacion DESC";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        // Bucle para recorrer todas las filas
        while ($row = mysqli_fetch_assoc($resultado)) {
            // Convertimos la ruta de la imagen a relativa solo en esta iteración
            $rutaImagen = str_replace('C:/xampp/htdocs', '', $row['foto']);
            ?>
            <div class="post-container">
                <div class="post-image">
                    <?php if ($rutaImagen) { ?>
                        <img src="<?php echo $rutaImagen; ?>" alt="Imagen del objeto" style="width: 100%; height: 100%; border-radius: 10px;">
                    <?php } else { ?>
                        <span>Sin imagen</span>
                    <?php } ?>
                </div>
                <div class="post-info">
                <div class="nombre-publico">
                        <span>Publicado por:<?php echo $row['nombre']; ?></span>
                    </div>
                <div class="folio-acta">
                        <span>Folio: <?php echo $row['folio_acta']; ?></span>
                    </div>
                <div class="fecha-creacion">
                        <span>Publicado el: <?php echo $row['fecha_creacion']; ?></span>
                    </div>
                    <div class="fecha-encuentro">
                        <span>Fecha de encuentro: <?php echo $row['fecha']; ?></span>
                    </div>
                    <div class="info-publi">
                        <span>Tipo de Objeto: <?php echo $row['tipo']; ?></span>
                        <span>Lugar: <?php echo $row['lugar']; ?></span>
                        <span>Descripción: <?php echo $row['descripcion']; ?></span>
                    </div>
                    <div class="correo-contacto">
                        <span>Contacto: <?php echo $row['correo']; ?></span>
                    </div>
                    
                </div>
            </div>
            <?php
        }
    } else {
        echo "<p>No hay publicaciones disponibles.</p>";
    }
} else {
    echo "<p>Error al conectar con la base de datos.</p>";
}
?>
