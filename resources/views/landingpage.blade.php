<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Video de Fondo</title>

    <style>
        /* Estilos generales */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Contenedor del video */
        .video-container {
            position: relative;
            width: 100%;
            height: 100vh; 
            overflow: hidden;
        }

        /* Video en fondo */
        .video-container video {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Capa de oscurecimiento sobre el video */
        .video-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); 
            z-index: 1;
        }

       
        .content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
            font-size: 2rem;
            font-weight: bold;
            padding-top: 40vh;
        }

        /* Texto con degradado */
        .content h1 {
            background: linear-gradient(45deg, #ff6b6b, #5f27cd);
            background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Estilos del botón */
        .content a {
            display: inline-block;
            background: linear-gradient(45deg, #ff9f43, #ff6b6b);
            text-decoration: none;
            color: white;
            font-size: 1.2rem;
            padding: 12px 24px;
            border-radius: 30px;
            cursor: pointer;
            transition: 0.3s;
        }

        /* Efecto hover en botón */
        .content a:hover {
            background: linear-gradient(45deg, #ff6b6b, #ff9f43);
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <div class="video-container">
        <!-- Video de fondo -->
        <video autoplay muted loop>
            <source src="videos/videolanding.mp4" type="video/mp4">
            Tu navegador no soporta videos.
        </video>

        <!-- Contenido encima del video -->
        <div class="content">
            <h1>Aprovecha el tiempo al máximo</h1>
            <a href="http://127.0.0.1:8000/login">¡Iniciar sesión!</a>
        </div>
    </div>

</body>
</html>
