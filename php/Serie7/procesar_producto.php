<?php
include 'productos.php'; // Incluir las funciones de productos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = $_POST['accion'];

    if ($accion == "Agregar Producto") {
        // Recibir los datos del formulario
        $nombre = trim($_POST['nombre']);
        $precio = floatval($_POST['precio']);
        $cantidad = intval($_POST['cantidad']);
        $mensaje = agregarProducto($nombre, $precio, $cantidad);
    } elseif ($accion == "Eliminar Producto") {
        // Recibir el nombre del producto a eliminar
        $nombre = trim($_POST['eliminar_nombre']);
        $mensaje = eliminarProducto($nombre);
    } elseif ($accion == "Actualizar Producto") {
        // Recibir los datos del formulario
        $nombre = trim($_POST['nombre']);
        $precio = floatval($_POST['precio']);
        $cantidad = intval($_POST['cantidad']);
        $mensaje = actualizarProducto($nombre, $precio, $cantidad);
    }

    // Redirigir a index.html con el mensaje
    header("Location: index.html?mensaje=" . urlencode($mensaje));
    exit();
} elseif (isset($_GET['obtenerProductos'])) {
    // Obtener y mostrar los productos
    echo obtenerProductos();
}
?>