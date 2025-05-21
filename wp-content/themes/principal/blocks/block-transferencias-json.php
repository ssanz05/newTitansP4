<?php
global $wpdb;

// Si tu tabla no tiene prefijo
$tabla = 'transfer_reservas';

// Consulta directamente en get_results
$reservas = $wpdb->get_results("SELECT * FROM $tabla", ARRAY_A);

// Depuración temporal
// echo '<pre>'; var_dump($reservas); echo '</pre>';

if ($reservas && !empty($reservas)) {
    echo '<div class="reservas-list">';
    echo '<h3>Reservas registradas</h3>';
    echo '<table border="1" cellpadding="5" cellspacing="0">';
    echo '<tr>';
    foreach(array_keys($reservas[0]) as $columna) {
        echo '<th>' . esc_html($columna) . '</th>';
    }
    echo '</tr>';
    foreach ($reservas as $reserva) {
        echo '<tr>';
        foreach ($reserva as $valor) {
            echo '<td>' . esc_html($valor) . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    echo '</div>';
} else {
    echo '<p>No hay reservas registradas.</p>';
}
?>
