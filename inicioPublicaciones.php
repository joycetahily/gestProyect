<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuentraTec</title>
    <style>
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

        /* Publicaciones */
        .post-container {
            background-color: #1E2A6E;
            height: 200px;
            width: 90%;
            max-width: 600px;
            margin: 15px 0;
            padding: 15px;
            border-radius: 10px;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            box-sizing: border-box;
        }

        .container {
            background-color: #1E2A6E;
            height: 300px;
            width: 90%;
            margin: 15px 0;
            padding: 15px;
            border-radius: 10px;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            box-sizing: border-box;
        }

        .post-info {
            flex: 1;
        }

        .post-date {
            font-size: 12px;
            color: #ccc;
        }

        .post-image {
            width: 85px;
            height: 85px;
            background-color: #bbb;
            border-radius: 10px;
            margin-right: 12px;
        }

        .info-publi {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .info-publi span, .info-pregunta span, .descripción span {
            background-color: #ccc;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            color: #000;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
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

        .post-date {
            position: relative;
        }

        .post-date span {
            background-color: #464545;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            color: #000;
            display: flex;
            justify-content: start;
            width: 100%;
            box-sizing: border-box;
        }

        .add-options {
            position: fixed;
            bottom: 120px;
            right: 30px;
            display: none;
            flex-direction: column;
            gap: 10px;
        }

        .add-option {
            background-color: #1E2A6E;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
            font-size: 14px;
            color: #fff;
            width: 80px;
            text-decoration: none;
        }

        .add-option:hover {
            background-color: #3A4A8E;
        }

        /* Botón agregar */
        .add-button {
            position: fixed;
            bottom: 60px;
            right: 30px;
            width: 50px;
            height: 50px;
            background-color: #1E2A6E;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #fff;
            cursor: pointer;
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

        body {
            font-family: Arial, sans-serif;
        }

        .modal {
            display: none; 
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); 
            justify-content: center;
            align-items: center;
            color: #000;
        }
        .modal-contenido {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            width: 80%;
            max-width: 500px;
            text-align: center;
        }
        .contenedor {
            border: 1px solid #666;
            padding: 15px;
            margin: 10px 0;
            font-size: 18px;
            border-radius: 5px;
        }
        .cerrar-btn {
            background-color: #001f54;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 20px;
            font-family: inherit;
        }
        /* Estilos para el botón "Ver más" */
        .abrir-btn {
            background-color: #007BFF; /* Azul */
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            font-family: inherit;
            margin-top: 5px;
            position: relative;
        }
        .chat {
            border: 1px solid #ddd;
            padding: 10px;
            margin-top: 20px;
            max-height: 200px;
            overflow-y: auto;
            color: #000;
        }
        .mensaje {
            text-align: left;
            margin: 5px 0;
        }
        .input-chat {
            display: flex;
            margin-top: 10px;
        }
        .input-chat input {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
            outline: none;
            font-family: inherit;
        }
        .input-chat button {
            padding: 8px 15px;
            border: none;
            background-color: #666;
            color: white;
            cursor: pointer;
            border-radius: 0 5px 5px 0;
            font-family: inherit;
        }

        /* Media Queries para ajustar en dispositivos pequeños */
        @media (max-width: 768px) {
            .post-container {
                flex-direction: column;
                align-items: center;
                width: 90%;
            }

            .post-image {
                width: 60px;
                height: 60px;
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
    </style>
</head>
<body>

    <!-- Encabezado -->
    <header class="header">
        <div class="header-logo">EncuentraTec</div>
        <div class="header-icons">
            <div class="header-icon">🔔</div>
            <div class="header-icon">💬</div>
            <div class="header-icon profile-icon">Z</div>
            <div class="header-icon" id="logout-icon">
                <img src="ImagenesPW/icons8-cerrar-sesión-24.png" alt="cerrar-sesion">
            </div>
        </div>
    </header>

    <!-- Publicaciones -->
    <div class="post-container">
        <button class="post-image"></button>
        <div class="post-info">
            <div class="post-date">
                <span>Publicado: </span>
            </div>
            <div class="info-publi">
                <span>Tipo de Objeto</span>
                <span>Lugar</span>
            </div>
            <div class="descripción">
                <span>Descripción</span>
            </div>
            <button class="abrir-btn" onclick="abrirModal()">Ver más</button>
        </div>
    </div>

    <div class="post-container">
        <div class="post-image"></div>
        <div class="post-info">
            <div class="post-date">
                <span>Publicado: </span>
            </div>
            <div class="info-pregunta">
                <span>Pregunta</span>
            </div>
        </div>
    </div>

    <div class="add-options" id="addOptions">
        <a href="preguntarObjeto.php" class="add-option">Preguntar</a>
        <a href="publicarObjeto.php" class="add-option">Publicar</a>
    </div>

    <!-- Botón de agregar -->
    <div class="add-button" onclick="toggleOptions()">+</div>


    <!-- Contenedor modal oculto -->
    <div id="miModal" class="modal">
        <div class="modal-contenido">
            <h2>Detalles del Objeto</h2>
            <div class="contenedor">Tipo</div>
            <div class="contenedor">Lugar</div>
            <div class="contenedor">Descripción</div>
            <div class="contenedor">imagenes</div>
            
            
            <!-- Sección de chat -->
            <div class="chat" id="chat">
                <!-- Aquí se mostrarán los mensajes -->
            </div>
            <div class="input-chat">
                <input type="text" id="mensajeInput" placeholder="Escribe un mensaje...">
                <button onclick="enviarMensaje()">Enviar</button>
            </div>
            
            <button class="cerrar-btn" onclick="cerrarModal()">Cerrar</button>
        </div>
    </div>


    <script>
        function toggleOptions() {
            const options = document.getElementById('addOptions');
            options.style.display = options.style.display === 'flex' ? 'none' : 'flex';
        }
        document.getElementById('logout-icon').addEventListener('click', function() {
            window.location.href = 'index.php';
        });

        function abrirModal() {
            document.getElementById("miModal").style.display = "flex";
        }

        function cerrarModal() {
            document.getElementById("miModal").style.display = "none";
        }

        function enviarMensaje() {
            const mensajeInput = document.getElementById("mensajeInput");
            const mensajeTexto = mensajeInput.value.trim();
            
            if (mensajeTexto) {
                const chat = document.getElementById("chat");

                // Crear un nuevo mensaje y añadirlo al chat
                const nuevoMensaje = document.createElement("div");
                nuevoMensaje.classList.add("mensaje");
                nuevoMensaje.textContent = mensajeTexto;

                chat.appendChild(nuevoMensaje);
                
                // Limpiar el campo de entrada
                mensajeInput.value = "";
                mensajeInput.focus();
                
                // Desplazar el chat hacia abajo para ver el último mensaje
                chat.scrollTop = chat.scrollHeight;
            }
        }

    </script>

    <!-- Footer -->
    <footer class="footer">
        Instituto Tecnológico de Veracruz
    </footer>

</body>
</html>
