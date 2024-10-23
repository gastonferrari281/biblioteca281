<?php
// Incluir el archivo de conexión
include '../include/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $libro = $_POST['libro'];
    $fecha_prestamo = date('Y-m-d');

    // Preparar la consulta para evitar inyecciones SQL
    $stmt = $conn->prepare("INSERT INTO prestamos (id_usuario, id_libro, fecha_prestamo) VALUES (?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("iis", $usuario, $libro, $fecha_prestamo); // "iis" indica los tipos: entero, entero, string

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Préstamo registrado correctamente.";
        } else {
            echo "Error al registrar el préstamo: " . $stmt->error;
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
    <title>Gestionar Préstamos</title>
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
    <h1>Préstamos</h1>
    <form method="POST">
        Usuario ID: <input type="number" name="usuario" required><br>
        Libro ID: <input type="number" name="libro" required><br>

        <!-- Agrupación de botones en una fila -->
        <div class="button-group">
            <!-- Botón para registrar préstamo -->
            <button type="submit" class="btn">Registrar Préstamo</button>

            <!-- Enlace para volver al inicio estilizado como botón -->
            <a href="../index.php" class="btn">Volver al Inicio</a>
        </div>
    </form>
</body>
</html>
