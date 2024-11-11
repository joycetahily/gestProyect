<?php

$imagen='';
if(isset($_FILES["foto"])){
    $file = $_FILES["foto"];
    $nombre= $file["name"];
    $tipoArchivo= $file["type"];
    $ruta_provisional= $file["tmp_name"];
    $size= $file["size"];
    $dimensiones= getimagesize($ruta_provisional);
    $width= $dimensiones[0];
    $height= $dimensiones[1];
    $carpeta= "C:/xampp/htdocs/EncuentraTec/Fotos/";
    if($tipoArchivo != 'image/jpg' && $tipoArchivo != 'image/JPG' && $tipoArchivo !='image/jpeg' && $tipoArchivo != "image/png"){
        echo "Error, el archivo no es una imagen";
    }
    else if ($size > 3*1024*1024){
        echo "Error el tamaño máximo es un 3MB";
    }
    else{
        $src=$carpeta.$nombre;
        move_uploaded_file($ruta_provisional, $src);
        $imagen= "C:/xampp/htdocs/EncuentraTec/Fotos/".$nombre;
    }
}

if(!empty($_POST["publicado"])) {
    $fecha = $_POST["fecha"];
    $lugar= $_POST["lugar"];
    $tipo = $_POST["tipo"];
    $descripcion = $_POST["descripcion"];
    $preguntaSeg = $_POST["pregunta_seguridad"];
    $publicado = 1;
    

        if(empty($fecha) || empty($lugar) || empty($tipo) || empty($descripcion || empty($preguntaSeg))) {
            echo '<div class="alerta">Uno de los campos está vacío</div>';
        } else {
            // Consulta para registrar al alumno
            $sql = mysqli_query($conexion,"INSERT INTO acta_objeto (fecha, lugar, tipo, descripcion, pregunta_seguridad, foto, publicado) VALUES ('$fecha','$lugar','$tipo','$descripcion', '$preguntaSeg', '$imagen', $publicado)");
            //header('location: ')
            if($sql == 1) {
                echo '<div class="success">objeto registrado correctamente</div>';
                //echo "<script>window.location.href = 'pagina_inicio.php';</script>";
            } else {
                echo '<div class="alerta">Error al registrar</div>';
            }
        }
    }
    ?>