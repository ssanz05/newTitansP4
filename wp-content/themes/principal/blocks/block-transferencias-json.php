<?php
global $wpdb;

$tabla = 'transfer_reservas';

$reservas = $wpdb->get_results("SELECT * FROM $tabla", ARRAY_A);

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
