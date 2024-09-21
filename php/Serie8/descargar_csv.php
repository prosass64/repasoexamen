<?php
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="tablas_multiplicar.csv"');

$output = fopen('php://output', 'w');

// Escribir el encabezado
fputcsv($output, ['Tabla', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12']);

// Escribir las filas de las tablas de multiplicar
for ($j = 1; $j <= 12; $j++) {
    $row = [$j];
    for ($i = 1; $i <= 12; $i++) {
        $row[] = $j * $i;
    }
    fputcsv($output, $row);
}

fclose($output);
exit();
?>