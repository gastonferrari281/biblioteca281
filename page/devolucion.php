<?php
include '../include/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prestamo_id = $_POST['prestamo_id'];
    $fecha_devolucion = date('Y-m-d');

    // Preparar la consulta para evitar inyecciones SQL
    $stmt = $conn->prepare("UPDATE prestamos SET fecha_devolucion=? WHERE id=?");
    if ($stmt) {
        $stmt->bind_param("si", $fecha_devolucion, $prestamo_id);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Devolución registrada correctamente.";
        } else {
            echo "Error al registrar la devolución: " . $stmt->error;
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }
}

// Cerrar la conexión solo si fue creada correctamente
if ($conn) {
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Devoluciones</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        /* Estilo para los botones */
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
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Registrar Devolución</h1>
    <form method="POST">
        ID del Préstamo: <input type="number" name="prestamo_id" required><br>

        <!-- Agrupación de botones en una fila -->
        <div class="button-group">
            <!-- Botón para registrar devolución -->
            <button type="submit" class="btn">Registrar Devolución</button>

            <!-- Enlace para volver al inicio estilizado como botón -->
            <a href="../index.php" class="btn">Volver al Inicio</a>
        </div>
    </form>
</body>
</html>
