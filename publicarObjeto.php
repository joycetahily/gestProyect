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
            height: 100vh;
            zoom: 110%;
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
            margin-top: 25px;
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
            margin-top: 20px;
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
            border: 6px 
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
            <input type="text" id="tipo" name= "tipo"placeholder="Nombre del Objeto" required>
        </div>
        
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <input type="text" id="descripcion" name="descripcion" placeholder="Escribe las características del objeto encontrado" required>
        </div>

        <div class="form-group">
            <label for="pregunta">Pregunta de Seguridad:</label>
            <input type="text" id="pregunta" name= "pregunta_seguridad" placeholder="Escribe una característica particular del objeto" required>
        </div>

        <!-- Selector de imágenes -->
        <div class="image-upload">
            <br>
            <input type="file" id="file-input" name = "foto" multiple required><br><br>
            <label for="file-input">Subir Imágenes (máximo 5)</label>
        </div>

        <!-- Contenedor de previsualización de imágenes -->
        <div class="image-preview-container" id="image-preview-container"></div>
       
        <input type="hidden" name="publicado" value="1">
        <input type="submit" value= "publicar" class= "publicar">
       
    </form>
    </div>

    <!-- Pie de página -->
    <div class="footer">Instituto Tecnológico de Veracruz</div>

    <script>

    const backButton = document.querySelector('.back-button');

    backButton.addEventListener('click', function(event) {
    // Verifica si alguno de los campos tiene contenido
    const inputs = [fecha, lugar, tipo, descripcion, pregunta, fileInput];
    const hasContent = inputs.some(input => input.value.trim() !== "") || fileInput.files.length > 0;

    // Si hay contenido en algún campo, muestra confirmación antes de salir
    if (hasContent) {
        const confirmExit = confirm("¿Está seguro que desea salir? Se perderán los datos ingresados.");
        if (!confirmExit) {
            event.preventDefault(); // Cancela la redirección si el usuario elige "Cancelar"
            return;
        }
    }

    // Si no hay contenido o el usuario confirma, redirige a la pantalla anterior
    window.location.href = 'inicioPantalla.html';
});

        const fileInput = document.getElementById('file-input');
        const previewContainer = document.getElementById('image-preview-container');

        // Maneja la previsualización y límite de imágenes
        fileInput.addEventListener('change', () => {
            previewContainer.innerHTML = ''; // Limpiar previsualizaciones anteriores
            const files = Array.from(fileInput.files);

            if (files.length > 5) {
                alert("Puedes subir un máximo de 5 imágenes.");
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
                        files.splice(index, 1); // Elimina el archivo del array
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
        const pregunta = document.getElementById('pregunta');
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

        // Escucha el evento de clic en el botón de enviar
        submitButton.addEventListener('click', (event) => {
            // Limpia cualquier error anterior
            clearError(fecha);
            clearError(lugar);
            clearError(tipo);
            clearError(descripcion);
            clearError(pregunta);
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

            if (!pregunta.value.trim()) {
                event.preventDefault();
                setError(pregunta, "Por favor, ingresa la pregunta de seguridad.");
                return;
            }

            if (fileInput.files.length === 0) {
                event.preventDefault();
                setError(fileInput, "Por favor, selecciona al menos una imagen.");
                return;
            }

            // Si todos los campos están completos, redirigir
            window.location.href = 'inicioPublicaciones.html';
        });

        // Limpia el borde rojo al empezar a llenar el campo
        [fecha, lugar, tipo, descripcion, pregunta].forEach(input => {
            input.addEventListener('input', () => clearError(input));
        });

        fileInput.addEventListener('change', () => clearError(fileInput));

    </script>
</body>
</html>
