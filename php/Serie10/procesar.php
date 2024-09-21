<?php
session_start();

// Inicializar el saldo si no existe
if (!isset($_SESSION['saldo'])) {
    $_SESSION['saldo'] = 0;
}

// Obtener la entrada JSON
$data = json_decode(file_get_contents('php://input'), true);
$tipo = $data['tipo'] ?? '';
$cantidad = (float)($data['cantidad'] ?? 0);
$mensaje = '';

if ($tipo === 'ingreso') {
    $_SESSION['saldo'] += $cantidad;
    $mensaje = "Ingreso de $cantidad realizado correctamente.";
} elseif ($tipo === 'retiro') {
    if ($_SESSION['saldo'] >= $cantidad) {
        $_SESSION['saldo'] -= $cantidad;
        $mensaje = "Retiro de $cantidad realizado correctamente.";
    } else {
        $mensaje = "Error: Saldo insuficiente para realizar el retiro.";
    }
} else {
    $mensaje = "Operación no válida.";
}

// Retornar saldo y mensaje como JSON
echo json_encode(['saldo' => $_SESSION['saldo'], 'mensaje' => $mensaje]);
?>