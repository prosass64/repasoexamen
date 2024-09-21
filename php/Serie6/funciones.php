<?php
$filename = "comentarios.txt"; // Archivo donde se guardarán los comentarios

// Función para validar y guardar el comentario
function procesarComentario($nombre, $correo, $comentario) {
    global $filename;

    // Validaciones básicas
    if (empty($nombre) || empty($correo) || empty($comentario)) {
        return "Todos los campos son obligatorios.";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        return "El correo no es válido.";
    } else {
        // Guardar el comentario en el archivo de texto
        $comentario_guardado = "Nombre: $nombre\nCorreo: $correo\nComentario: $comentario\n---\n";
        file_put_contents($filename, $comentario_guardado, FILE_APPEND);
        return true; // Indica éxito
    }
}

// Función para obtener todos los comentarios
function obtenerComentarios() {
    global $filename;
    
    if (file_exists($filename)) {
        return nl2br(file_get_contents($filename));
    } else {
        return "No hay comentarios aún.";
    }
}