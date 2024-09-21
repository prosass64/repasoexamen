<?php
session_start(); // Iniciar la sesión

// Inicializar el array de productos si no existe
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
}

// Función para agregar un nuevo producto
function agregarProducto($nombre, $precio, $cantidad) {
    if (isset($_SESSION['productos'])) {
        foreach ($_SESSION['productos'] as $producto) {
            if ($producto['nombre'] === $nombre) {
                return "El producto ya existe.";
            }
        }

        // Agregar el producto
        $_SESSION['productos'][] = ["nombre" => $nombre, "precio" => $precio, "cantidad" => $cantidad];
        return "Producto agregado con éxito.";
    }
    return "Error al agregar el producto.";
}

// Función para eliminar un producto por su nombre
function eliminarProducto($nombre) {
    if (isset($_SESSION['productos'])) {
        foreach ($_SESSION['productos'] as $index => $producto) {
            if ($producto['nombre'] === $nombre) {
                array_splice($_SESSION['productos'], $index, 1); // Eliminar el producto
                return "Producto eliminado con éxito.";
            }
        }
    }
    return "Producto no encontrado.";
}

// Función para actualizar el precio o cantidad de un producto
function actualizarProducto($nombre, $precio, $cantidad) {
    if (isset($_SESSION['productos'])) {
        foreach ($_SESSION['productos'] as &$producto) {
            if ($producto['nombre'] === $nombre) {
                $producto['precio'] = $precio;
                $producto['cantidad'] = $cantidad;
                return "Producto actualizado con éxito.";
            }
        }
    }
    return "Producto no encontrado.";
}

// Función para obtener el listado de productos
function obtenerProductos() {
    if (isset($_SESSION['productos']) && count($_SESSION['productos']) > 0) {
        $html = "<table border='1'>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>";
        foreach ($_SESSION['productos'] as $producto) {
            $html .= "<tr>
                        <td>{$producto['nombre']}</td>
                        <td>{$producto['precio']}</td>
                        <td>{$producto['cantidad']}</td>
                      </tr>";
        }
        $html .= "</table>";
        return $html;
    }
    return "No hay productos registrados.";
}
?>
