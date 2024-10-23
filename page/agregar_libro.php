<!DOCTYPE html>
<html>
<head>
    <title>Agregar Libros</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }
        .button-group {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    <h1>Agregar Libros</h1>
    <form method="POST">
        Título: <input type="text" name="titulo" required><br>
        Autor: <input type="text" name="autor" required><br>
        ISBN: <input type="text" name="isbn"><br>
        Año de Publicación: <input type="number" name="anio_publicacion" required><br>
        Género: <input type="text" name="genero"><br>

        <!-- Agrupación de botones en una fila -->
        <div class="button-group">
            <!-- Botón Agregar Libro -->
            <button type="submit">Agregar Libro</button>

            <!-- Enlace para volver al inicio -->
            <a href="../index.php" class="btn">Volver al Inicio</a>
        </div>
    </form>
</body>
</html>
