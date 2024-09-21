<?php
session_start();

// Inicializar variables
$mensaje = '';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'] ?? '';
    $edad = $_POST['edad'] ?? '';
    $correo = $_POST['correo'] ?? '';

    // Validación
    if (empty($nombre)) {
        $mensaje = 'El nombre no puede estar vacío.';
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $mensaje = 'El correo electrónico no es válido.';
    } else {
        // Almacenar datos en sesión
        $_SESSION['nombre'] = $nombre;
        $_SESSION['edad'] = $edad;
        $_SESSION['correo'] = $correo;
        $mensaje = 'Datos almacenados correctamente.';
    }
}

// Devolver el mensaje como respuesta
echo $mensaje;
?>