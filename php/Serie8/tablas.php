<?php
// Generar la tabla de multiplicar
echo '<table border="1">
        <thead>
            <tr>
                <th>Tabla</th>';
for ($i = 1; $i <= 12; $i++) {
    echo "<th>$i</th>";
}
echo '    </tr>
        </thead>
        <tbody>';

for ($j = 1; $j <= 12; $j++) {
    echo "<tr>";
    echo "<td>$j</td>";
    for ($i = 1; $i <= 12; $i++) {
        echo "<td>" . ($j * $i) . "</td>";
    }
    echo "</tr>";
}
echo '    </tbody>
      </table>';
?>