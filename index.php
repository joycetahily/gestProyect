<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuentraTec - Inicio de Sesión</title>
    <style>
        /* Estilos previos */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative; /* Para posicionar elementos flotantes */
        }

        .container {
            width: 100%;
            max-width: 600px;
            height: 98%;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            position: relative; /* Para posicionar elementos internos */
        }

        .header {
            background-color: #001f54;
            padding: 15px;
            height: 50px;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header img {
            width: 50px;
            height: auto;
        }

        .header h1 {
            font-size: 25px;
            font-weight: bold;
            margin-left: 5px;
        }

        .image-container img {
            width: 100%;
            height: 140pt;
            object-fit: cover;
        }

        .icon-container {
            margin-top: -50px;
        }

        .icon-container img {
            width: 120px;
            height: 110px;
            background-color: #001f54;
            border-radius: 50%;
            padding: 20px;
        }

        .welcome-text {
            margin: 15px 0;
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }

        .selecciona-rol {
            margin: 10px 0;
            font-size: 13px;
            font-weight: bold;
            color: #333;
        }

        .form-group {
            padding: 0 40px;
            position: relative; /* Para posicionar el checkbox */
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group input[type="password"] {
            padding-right: 40px; /* Espacio para el checkbox */
        }

        /* Checkbox para mostrar la contraseña */
        .show-password {
            margin-top: 1px;
            display: flex;
            align-items: center;
            font-size: 15px;
        }

        .show-password input[type="checkbox"] {
            margin-right: 10px;
            width: 16px;
            height: 16px;
        }

        .btn {
            background-color: #001f54;
            color: #fff;
            border: none;
            padding: 12px;
            width: 50%;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #003682;
        }

        .error-message {
            color: red;
            font-size: 12px;
            margin-top: -7px;
            display: none;
        }

        .register-text {
            margin-top: 15px;
            font-size: 16px;
            color: #666;
        }

        .register-link {
            color: #555;
            font-weight: bold;
            text-decoration: none;
        }

        .register-link:hover {
            text-decoration: underline;
        }

        /* Responsividad para dispositivos móviles */
        @media (max-width: 480px) {
            .container {
                padding: 10px;
            }

            .header h1 {
                font-size: 20px;
            }

            .welcome-text {
                font-size: 18px;
            }

            .selecciona-rol {
                font-size: 12px;
            }

            .form-group input {
                padding: 10px;
                font-size: 14px;
            }

            .btn {
                width: 70%;
                padding: 10px;
                font-size: 16px;
            }

            .show-password {
                padding-right: 20px;
            }

            .show-password input[type="checkbox"] {
                transform: scale(1);
            }
        }

        /* ------------------ Estilos del Botón Flotante y Modal ------------------ */

        /* Estilos para el botón flotante */
        #boton-flotante {
            position: fixed;
            width: 50px;
            height: 50px;
            bottom: 20px;
            right: 20px;
            background-color: grey; /* Color de fondo */
            color: black; /* Color del texto */
            border: none;
            padding: 15px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1001; /* Asegura que el botón esté por encima del modal */
        }

        #boton-flotante:hover {
            background-color: #0056b3;
        }

        /* Estilos para el modal */
        .modal {
            display: none; /* Oculto por defecto */
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4); /* Fondo semitransparente */
        }

        /* Contenido del modal */
        .modal-contenido {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 8px;
            position: relative;
            text-align: left;
        }

        /* Botón de cerrar */
        .cerrar {
            color: #aaa;
            position: flex;
            top: 10px;
            right: 20px;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .cerrar:hover,
        .cerrar:focus {
            color: black;
            text-decoration: none;
        }

        /* Estilos para el enlace */
        .modal-contenido a {
            color: #007BFF;
            text-decoration: none;
        }

        .modal-contenido a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Encabezado e imágenes -->
        <div class="header">
            <img src="ImagenesPW/logoItver.png" alt="logoitver">
            <h1>EncuentraTec</h1>
            <img src="ImagenesPW/logoTecnm.png" alt="logotec">
        </div>
        <div class="image-container">
            <img src="ImagenesPW/imagentec.jpg" alt="entradatec">
        </div>
        <div class="icon-container">
            <img src="ImagenesPW/pngwing.com.png" alt="logoPagina">
        </div>

        <!-- Formulario de inicio de sesión -->
        <form action="controlador/controlador_iniciosesion.php" method="POST">
            <div class="welcome-text">Te damos la bienvenida a EncuentraTec</div>
            <div class="selecciona-rol">Selecciona tu Rol</div>
            <select class="role-text" id="role-select" name="rol" required>
                <option value="" hidden>Selecciona tu rol</option>
                <option value="alumno">Alumno</option>
                <option value="administrador">Administrador</option>
            </select>

            <div class="form-group">
                <input type="text" id="user-input" name="identificador" placeholder="Número de Control o Correo" required>
                <div class="error-message" id="control-error">El número de control o correo es incorrecto.</div>
            </div>

            <div class="form-group">
                <input type="password" id="password-input" name="password" placeholder="Contraseña" required>
                <div class="error-message" id="password-error">La contraseña debe tener al menos 8 caracteres.</div>
                <!-- Checkbox para mostrar la contraseña -->
                <div class="show-password">
                    <input type="checkbox" id="toggle-password">
                    <label for="toggle-password">Mostrar Contraseña</label>
                </div>
            </div>

            <button type="submit" class="btn">Iniciar sesión</button>
        </form>

        <p class="register-text">
            <br>¿No tienes una cuenta? <a href="registroAlumno.php" class="register-link">Regístrate</a>
        </p>
    </div>

    <!-- Botón flotante -->
    <button id="boton-flotante">?</button>

    <!-- Contenedor modal -->
    <div id="modal" class="modal">
        <div class="modal-contenido">
            <span class="cerrar">&times;</span>
            <p>
                En caso de ser visitante, dejar el objeto encontrado en el
                <a href="https://www.facebook.com/CESAITVER/?locale=es_LA" target="_blank">CESA</a>,
                ubicado en el primer piso del edificio E. Gracias.
            </p>
        </div>
    </div>

    <script>
        const roleSelect = document.getElementById('role-select');
        const userInput = document.getElementById('user-input');

        // Cambia el placeholder y tipo del campo según el rol seleccionado
        roleSelect.addEventListener('change', () => {
            if (roleSelect.value === 'alumno') {
                userInput.placeholder = 'Número de Control';
                userInput.type = 'text';
                userInput.maxLength = 8;
                userInput.pattern = "\\d{8}";
                userInput.inputMode = "numeric";
                userInput.value = ""; // Limpiar el campo al cambiar de rol
            } else if (roleSelect.value === 'administrador') {
                userInput.placeholder = 'Correo Electrónico';
                userInput.type = 'email';
                userInput.removeAttribute('maxlength');
                userInput.removeAttribute('pattern');
                userInput.removeAttribute('inputmode');
                userInput.value = ""; // Limpiar el campo al cambiar de rol
            } else {
                userInput.placeholder = 'Número de Control o Correo';
                userInput.type = 'text';
                userInput.removeAttribute('maxlength');
                userInput.removeAttribute('pattern');
                userInput.removeAttribute('inputmode');
                userInput.value = ""; // Limpiar el campo al cambiar de rol
            }
        });

        // Previene la entrada de caracteres no numéricos cuando el rol es 'alumno'
        userInput.addEventListener('input', () => {
            if (roleSelect.value === 'alumno') {
                userInput.value = userInput.value.replace(/\D/g, '');
            }
        });

        // Funcionalidad para mostrar/ocultar la contraseña
        const togglePassword = document.getElementById('toggle-password');
        const passwordInput = document.getElementById('password-input');

        togglePassword.addEventListener('change', function () {
            if (this.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });

        // Validación básica del formulario antes de enviarlo
        const form = document.querySelector('form');
        form.addEventListener('submit', function (event) {
            const identificador = userInput.value.trim();
            const password = passwordInput.value.trim();
            const controlError = document.getElementById('control-error');
            const passwordError = document.getElementById('password-error');

            let valid = true;

            // Validar identificador
            if (roleSelect.value === 'alumno') {
                const numControlPattern = /^\d{8}$/; // 8 dígitos exactos
                if (!numControlPattern.test(identificador)) {
                    controlError.textContent = "El número de control debe tener exactamente 8 dígitos.";
                    controlError.style.display = 'block';
                    valid = false;
                } else {
                    controlError.style.display = 'none';
                }
            } else if (roleSelect.value === 'administrador') {
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(identificador)) {
                    controlError.textContent = "El correo electrónico es inválido.";
                    controlError.style.display = 'block';
                    valid = false;
                } else {
                    controlError.style.display = 'none';
                }
            } else {
                controlError.textContent = "Por favor, selecciona un rol válido.";
                controlError.style.display = 'block';
                valid = false;
            }

            // Validar contraseña
            if (password.length < 8) {
                passwordError.style.display = 'block';
                valid = false;
            } else {
                passwordError.style.display = 'none';
            }

            // Prevenir el envío del formulario si hay errores
            if (!valid) {
                event.preventDefault();
            }
        });

        // ------------------ Funcionalidad del Modal ------------------

        // Obtener elementos
        const botonFlotante = document.getElementById('boton-flotante');
        const modal = document.getElementById('modal');
        const spanCerrar = document.querySelector('.cerrar');

        // Cuando el usuario hace clic en el botón, abre el modal
        botonFlotante.onclick = function () {
            modal.style.display = "block";
        }

        // Cuando el usuario hace clic en <span> (x), cierra el modal
        spanCerrar.onclick = function () {
            modal.style.display = "none";
        }

        // Cuando el usuario hace clic fuera del contenido del modal, lo cierra
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>
