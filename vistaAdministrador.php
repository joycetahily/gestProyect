<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuentraTec</title>
    
    <style>
         /* Encabezado */
         .header {
            width: 100%;
            background-color: #1E2A6E;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            box-sizing: border-box;
        }

        .header-logo {
            font-size: 24px;
            font-weight: bold;
        }

        /* Contenedor de iconos */
        .header-icons {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .header-icon {
            width: 40px;
            height: 40px;
            background-color: #ccc;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: #000;
            cursor: pointer;
        }

        .profile-icon {
            background-color: #ff7f00;
            color: #fff;
            font-weight: bold;
            border: 2px solid #000;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #fff;
        }

        /* Publicaciones */
        .post-container {
            display: flex;
            background-color: #1E2A6E;
            width: 90%;
            max-width: 650px;
            height: 300px;
            margin: 15px 0;
            padding: 15px;
            border-radius: 10px;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            box-sizing: border-box;
        }

        .post-info {
            display:flex;
            flex-direction: column;
            align-items: left;
            justify-content: space-between;
            gap: 10px;
            margin-right: 180px;
        }
        
        .post-image {
            width: 170px;
            height: 200px;
            border-radius: 8px;
            margin-right: 15px;
            flex-shrink: 0;
            overflow: hidden;
        }
        .post-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
        }
        .info-publi {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .info-publi span, .info-pregunta span, .descripción span {
            background-color: #ccc;
            padding: 8px 10px;
            border-radius: 5px;
            font-size: 16px;
            color: #000;
            text-align: center;
            width: fit-content;
            max-width: 100%;
            box-sizing: border-box;
        }

        .info-pregunta span {
            height: 60px;
        }

        .descripción {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .fecha-encuentro {
            display: flex;
            flex-direction: column;
            gap: 50px;
            background-color: #464545;
            padding: 4px 8px;
            border-radius: 5px;
            font-size: 14px;
            color: #000;
            width: fit-content;
            box-sizing: border-box;
            /* height: ; */ /* Eliminado por ser innecesario */
            max-width: 100%;
        }

        /* Footer */
        .footer {
            margin-top: 10px;
            width: 100%;
            background-color: #001f54;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            font-size: 14px;
        }

        /* creo q también fue añadido */
        
        /* Media Queries para ajustar en dispositivos pequeños */
        @media (max-width: 768px) {
            .post-container {
                flex-direction: column;
                align-items: center;
                width: 90%;
            }

            .post-image {
                width: 90px;
                height: 90px;
                margin-bottom: 10px;
            }

            .header, .footer {
                padding: 10px;
            }

            .add-button {
                bottom: 20px;
                right: 20px;
            }
        }

        /* ------------------ Estilos del Botón Añadir Usuario ------------------ */
                /* cambios */

        .add-button {
            position: fixed;
            bottom: 60px; /* Ajustado para evitar superposición con el footer */
            right: 20px;
            background-color: #007BFF; /* Azul */
            color: #000; /* Letras negras */
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000; /* Asegura que el botón esté por encima de otros elementos */
            text-decoration: none; /* Eliminar subrayado del enlace */
            transition: background-color 0.3s, color 0.3s;
        }

        .add-button:hover {
            background-color: #0056b3; /* Azul más oscuro al pasar el cursor */
            color: #fff; /* Cambiar letras a blanco al pasar el cursor */
        }

    </style>
</head>

<body>
    <!-- boton de salida, todo el header --> 
     <!-- Encabezado -->
     <header class="header">
        <div class="header-logo">EncuentraTec</div>
        <div class="header-icons">
            <div class="header-icon">
                <a href="index.php" aria-label="Inicio">
                    <img src="ImagenesPW/icons8-cerrar-sesión-24.png" alt="cerrar-sesión">
                </a>
            </div>
        </div>
    </header>
    <?php
    include("C:/xampp/htdocs/EncuentraTec/Controlador/controlador_vistaAdmiP.php");
    include("C:/xampp/htdocs/EncuentraTec/modelo/conexion_BD.php");
    ?>

        <!-- boton de usuario-->
    <!-- Botón Añadir Usuario -->
    <a href="registro.php" class="add-button">Añadir Usuario</a>

    <!-- Footer -->
    <footer class="footer">
        Instituto Tecnológico de Veracruz
    </footer>

</body>
</html>
