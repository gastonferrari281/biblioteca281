<!DOCTYPE html>
<html>
<head>
    <title>Agregar Usuarios</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        /* Estilo para el botón de enlace */
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

        /* Agrupar los botones en una fila */
        .button-group {
            display: flex;
            gap: 10px; /* Espacio entre los botones */
        }
    </style>
</head>
<body>
    <h1>Agregar Usuarios</h1>
    <form method="POST">
        Nombre y Apellido: <input type="text" name="nombre_apellido" required><br>
        Email: <input type="email" name="email" required><br>

        <!-- Agrupación de botones en una fila -->
        <div class="button-group">
            <!-- Botón Agregar Usuario -->
            <button type="submit">Agregar Usuario</button>

            <!-- Enlace para volver al inicio -->
            <a href="../index.php" class="btn">Volver al Inicio</a>
        </div>
    </form>
</body>
</html>
