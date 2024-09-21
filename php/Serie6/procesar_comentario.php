<?php
include 'funciones.php'; // Incluir archivo de funciones

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar comentario desde el formulario
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $comentario = trim($_POST['comentario']);
    
    // Procesar el comentario usando la función
    $resultado = procesarComentario($nombre, $correo, $comentario);

    // Redirigir de nuevo al HTML con un mensaje en la URL
    if ($resultado === true) {
        header("Location: serie6.html?mensaje=" . urlencode("Comentario guardado con éxito."));
    } else {
        header("Location: serie6.html?mensaje=" . urlencode($resultado));
    }
    exit();
} elseif (isset($_GET['obtenerComentarios'])) {
    // Obtener y devolver los comentarios
    echo obtenerComentarios();
}
