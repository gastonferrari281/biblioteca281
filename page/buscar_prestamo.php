<?php 
include '../include/conexion.php'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Préstamos Pendientes</title>
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
    <h1>Préstamos Pendientes</h1>

    <?php
    // Consulta para obtener préstamos pendientes
    $sql = "
        SELECT p.id AS prestamo_id, u.nombre_apellido, l.titulo, l.autor
        FROM prestamos p
        JOIN usuarios u ON p.id_usuario = u.id
        JOIN libros l ON p.id_libro = l.id
        WHERE p.fecha_devolucion IS NULL"; // Solo préstamos sin fecha de devolución

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        echo "<h2>Resultados</h2><ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>Préstamo ID: " . $row['prestamo_id'] . " - Usuario: " . $row['nombre_apellido'] . " - Libro: " . $row['titulo'] . " - Autor: " . $row['autor'] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<h2>No hay préstamos pendientes.</h2>";
    }

    // Cerrar la conexión
    $conn->close();
    ?>

    <!-- Agrupación de botones en una fila -->
    <div class="button-group">
        <!-- Enlace para volver al inicio -->
        <a href="../index.php" class="btn">Volver al Inicio</a>
    </div>
</body>
</html>
