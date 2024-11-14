<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acta del Objeto - EncuentraTec</title>
    <style>
        /* Estilos originales */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Eliminado height: 100vh para permitir scroll */
            /* height: 100vh; */
            zoom: 110%;
            min-height: 100vh; /* Asegura que el body al menos ocupe toda la altura */
        }
        .header {
            width: 100%;
            height: 50px;
            background-color: #001f54;
            padding: 10px;
            color: #fff;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 20px;
        }
        .header img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
        .header h1 {
            font-size: 24px;
            font-weight: bold;
        }
        .container {
            background-color: #1a2a66;
            width: 100%;
            max-width: 450px;
            padding: 20px;
            margin-top: 10px;
            border-radius: 8px;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Asegurar que el contenedor no exceda la altura de la ventana */
            margin-bottom: 60px; /* Espacio para el footer */
        }
        .back-button {
            color: #fff;
            font-size: 24px;
            text-align: left;
            cursor: pointer;
            margin-bottom: 10px;
        }
        .title {
            color: #fff;
            font-size: 22px;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            color: #fff;
            font-size: 16px;
            margin-bottom: 5px;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
            background-color: #e0e0e0;
        }
        .image-upload {
            margin-top: 20px;
            text-align: center;
        }
        .image-upload input[type="file"] {
            display: none;
        }
        .image-upload label {
            background-color: #001f54;
            color: #fff;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .publicar {
            background-color: #003682;
            color: #fff;
            border: none;
            padding: 12px;
            width: 100%;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
            margin-top: 2px;
        }
        .submit-button:hover {
            background-color: #0055aa;
        }
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

        /* Estilos para previsualización de imágenes */
        .image-preview-container {
            margin-top: 15px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .image-preview {
            position: relative;
            width: 80px;
            height: 80px;
        }
        .image-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .remove-image {
            position: absolute;
            top: 0;
            right: 0;
            background-color: red;
            color: white;
            border: none;
            border-radius: 50%;
            font-size: 12px;
            width: 20px;
            height: 20px;
            cursor: pointer;
        }
        .error-border {
            border: 2px solid red; /* Estilo completo para el borde de error */
        }
    </style>
</head>
<body>

    <!-- Encabezado -->
    <div class="header">
        <img src="/EncuentraTec/ImagenesPW/logoTECNM.png" alt="Logo TECNM">
        <h1>EncuentraTec</h1>
        <img src="/EncuentraTec/ImagenesPW/logoITVER.png" alt="Logo ITVER">
    </div>

    <!-- Contenedor principal -->
    <div class="container">
        <div class="back-button">&#8592;</div>
        <div class="title">Acta del Objeto</div>
        <?php
        include("C:/xampp/htdocs/EncuentraTec/modelo/conexion_BD.php");
        include("C:/xampp/htdocs/EncuentraTec/controlador/controlador_actaObj.php");
        ?>
        <form action=" " method="POST" enctype="multipart/form-data">
        <!-- Formulario de datos -->
        <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" placeholder="Calendario*" required>
        </div>
        
        <div class="form-group">
            <label for="lugar">Lugar:</label>
            <input type="text" id="lugar" name="lugar" placeholder="Edificio o Zona" required>
        </div>
        
        <div class="form-group">
            <label for="tipo">Tipo:</label>
            <input type="text" id="tipo" name="tipo" placeholder="Nombre del Objeto" required>
        </div>
        
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <input type="text" id="descripcion" name="descripcion" placeholder="Escribe las características del objeto encontrado" required>
        </div>

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre">
        </div>
        
        <div class="form-group">
            <label for="correo">Ingrese su correo electrónico:</label>
            <input type="email" id="correo" name="correo" placeholder="Por este medio se podrán contactar contigo" required>
        </div>

        <!-- Selector de imágenes -->
        <div class="image-upload">
           
            <input type="file" id="file-input" name="foto" multiple required>
            <label for="file-input">Subir Imagen</label>
        </div>

        <!-- Contenedor de previsualización de imágenes -->
        <div class="image-preview-container" id="image-preview-container"></div>
       
        <input type="hidden" name="publicado" value="1">
        <input type="submit" value="Publicar" class="submit-button publicar">
       
    </form>
    </div>

    <!-- Pie de página -->
    <div class="footer">Instituto Tecnológico de Veracruz</div>

    <script>

    const backButton = document.querySelector('.back-button');

    backButton.addEventListener('click', function(event) {
        // Verifica si alguno de los campos tiene contenido
        const inputs = [fecha, lugar, tipo, descripcion, numControl, fileInput];
        const hasContent = inputs.some(input => {
            if (input.type === 'file') {
                return input.files.length > 0;
            }
            return input.value.trim() !== "";
        });

        // Si hay contenido en algún campo, muestra confirmación antes de salir
        if (hasContent) {
            const confirmExit = confirm("¿Está seguro que desea salir? Se perderán los datos ingresados.");
            if (!confirmExit) {
                event.preventDefault(); // Cancela la redirección si el usuario elige "Cancelar"
                return;
            }
        }

        // Si no hay contenido o el usuario confirma, redirige a la pantalla anterior
        window.location.href = 'inicioPublicaciones.php';
    });

    const fileInput = document.getElementById('file-input');
    const previewContainer = document.getElementById('image-preview-container');

    // Maneja la previsualización y límite de imágenes
    fileInput.addEventListener('change', () => {
        previewContainer.innerHTML = ''; // Limpiar previsualizaciones anteriores
        const files = Array.from(fileInput.files);

        if (files.length > 1) {
            alert("Por cuestiones de almacenamiento, únicamente puedes ingresar 1 imagen.");
            fileInput.value = ''; // Limpiar el campo de archivos si se excede el límite
            return;
        }

        files.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imagePreview = document.createElement('div');
                imagePreview.classList.add('image-preview');

                const img = document.createElement('img');
                img.src = e.target.result;

                const removeButton = document.createElement('button');
                removeButton.classList.add('remove-image');
                removeButton.innerHTML = '&times;';
                removeButton.onclick = () => {
                    // Crear un nuevo DataTransfer para actualizar los archivos
                    const dt = new DataTransfer();
                    const updatedFiles = Array.from(fileInput.files).filter((_, i) => i !== index);
                    updatedFiles.forEach(f => dt.items.add(f));
                    fileInput.files = dt.files;

                    previewContainer.removeChild(imagePreview); // Quita la previsualización
                };

                imagePreview.appendChild(img);
                imagePreview.appendChild(removeButton);
                previewContainer.appendChild(imagePreview);
            };
            reader.readAsDataURL(file);
        });
    });

    // Validaciones del formulario y restricciones de fecha
    const submitButton = document.querySelector('.submit-button');
    const fecha = document.getElementById('fecha');
    const lugar = document.getElementById('lugar');
    const tipo = document.getElementById('tipo');
    const descripcion = document.getElementById('descripcion');
    const numControl = document.getElementById('numControl');
    const correo = document.getElementById('correo');
    const today = new Date().toISOString().split('T')[0];
    fecha.setAttribute('max', today);
   
    function setError(element, message) {
        alert(message); // Muestra el mensaje de alerta
        element.classList.add('error-border'); // Añade borde de error
        element.focus(); // Enfoca el campo
    }

    // Limpia el borde de error al iniciar el llenado de un campo
    function clearError(element) {
        element.classList.remove('error-border');
    }

    // Función para validar el correo con regex
    function validateEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    // Escucha el evento de clic en el botón de enviar
    submitButton.addEventListener('click', (event) => {
        // Limpia cualquier error anterior
        clearError(fecha);
        clearError(lugar);
        clearError(tipo);
        clearError(descripcion);
        clearError(numControl);
        clearError(correo);
        clearError(fileInput);

        // Validación de cada campo
        if (!fecha.value) {
            event.preventDefault();
            setError(fecha, "Por favor, selecciona una fecha.");
            return;
        }
        
        if (!lugar.value.trim()) {
            event.preventDefault();
            setError(lugar, "Por favor, ingresa el lugar.");
            return;
        }

        if (!tipo.value.trim()) {
            event.preventDefault();
            setError(tipo, "Por favor, ingresa el tipo de objeto.");
            return;
        }

        if (!descripcion.value.trim()) {
            event.preventDefault();
            setError(descripcion, "Por favor, ingresa la descripción del objeto.");
            return;
        }

        if (!numControl.value.trim()) {
            event.preventDefault();
            setError(numControl, "Por favor, ingresa tu número de control.");
            return;
        }

        // Validar que numControl esté entre 19,000,000 y 24,999,999
        const numControlValue = parseInt(numControl.value, 10);
        if (isNaN(numControlValue) || numControlValue < 19000000 || numControlValue > 24999999) {
            event.preventDefault();
            setError(numControl, "El número de control no es válido");
            return;
        }

        if (!correo.value.trim()) {
            event.preventDefault();
            setError(correo, "Por favor, ingresa tu correo electrónico.");
            return;
        }

        // Validar el formato del correo
        if (!validateEmail(correo.value.trim())) {
            event.preventDefault();
            setError(correo, "Por favor, ingresa un correo electrónico válido.");
            return;
        }

        if (fileInput.files.length === 0) {
            event.preventDefault();
            setError(fileInput, "Por favor, selecciona al menos una imagen.");
            return;
        }

        // Si todos los campos están completos y válidos, permitir el envío
        // No redirigir manualmente, dejar que el formulario se envíe
    });

    // Limpia el borde rojo al empezar a llenar el campo
    [fecha, lugar, tipo, descripcion, numControl, correo].forEach(input => {
        input.addEventListener('input', () => clearError(input));
    });

    fileInput.addEventListener('change', () => clearError(fileInput));

    </script>
</body>
</html>
