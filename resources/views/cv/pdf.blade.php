<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>CV de {{ $cv->full_name }}</title>
    <style>
        /* Reset básico para eliminar márgenes y paddings por defecto */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 40px auto; /* Centrar la página con margen superior e inferior */
            padding: 30px;
            background-color: #fff; /* Fondo blanco para el contenido */
            border: 2px solid #add8e6; /* Marco celeste */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra opcional para mayor profundidad */
        }

        header {
            display: flex;
            align-items: center;
            border-bottom: 2px solid #000; /* Línea negra */
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        header img {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            object-fit: cover;
            margin-right: 20px;
        }

        header .info {
            flex: 1;
        }

        header h1 {
            font-size: 24px; /* Aumentar tamaño para mayor legibilidad */
            color: #000; /* Nombre en negro */
            margin-bottom: 10px;
        }

        header p {
            font-size: 14px; /* Tamaño para el contacto */
            color: #555; /* Contenido en gris */
        }

        section {
            margin-bottom: 20px;
            border: 1px solid #000; /* Cuadro negro */
            padding: 15px;
            border-radius: 5px;
            background-color: #fafafa;
        }

        section h2 {
            font-size: 18px; /* Tamaño para títulos de secciones */
            color: #000; /* Títulos en negro */
            margin-bottom: 10px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }

        .section-content p,
        .section-content ul {
            font-size: 14px; /* Tamaño para el contenido */
            color: #555; /* Contenido en gris */
            margin-left: 20px;
        }

        .skills, .languages {
            display: flex;
            flex-wrap: wrap;
        }

        .skills li, .languages li {
            /* Eliminamos el fondo celeste */
            /* background: #add8e6; */ /* Fondo celeste para las etiquetas */
            color: #000; /* Texto en negro */
            padding: 5px 10px;
            margin: 5px;
            /* Opcional: puedes mantener el border-radius si deseas bordes redondeados */
            border-radius: 15px;
            list-style: none;
            font-size: 14px;
            /* Opcional: agregar un borde sutil para mantener un estilo distintivo */
            /* border: 1px solid #000; */
        }

        @media (max-width: 600px) {
            header {
                flex-direction: column;
                align-items: flex-start;
            }

            header img {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <!-- Puedes añadir una foto si tienes -->
            <!-- <img src="ruta/a/tu/foto.jpg" alt="Foto de {{ $cv->full_name }}"> -->
            <div class="info">
                <h1>{{ $cv->full_name }}</h1>
                <p>Contacto: {{ $cv->contact_info }}</p>
            </div>
        </header>

        <section>
            <h2>Educación</h2>
            <div class="section-content">
                <p>{{ $cv->education }}</p>
            </div>
        </section>

        <section>
            <h2>Experiencia Laboral</h2>
            <div class="section-content">
                <p>{{ $cv->work_experience }}</p>
            </div>
        </section>

        <section>
            <h2>Habilidades</h2>
            <div class="section-content skills">
                <ul>
                    @foreach(explode(',', $cv->skills) as $skill)
                        <li>{{ trim($skill) }}</li>
                    @endforeach
                </ul>
            </div>
        </section>

        <section>
            <h2>Idiomas</h2>
            <div class="section-content languages">
                <ul>
                    @foreach(explode(',', $cv->languages) as $language)
                        <li>{{ trim($language) }}</li>
                    @endforeach
                </ul>
            </div>
        </section>
    </div>
</body>
</html>
