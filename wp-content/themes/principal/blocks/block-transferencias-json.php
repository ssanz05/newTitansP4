<?php

$url = 'http://79.155.68.76:5025/api/resumen-zonas';
$response = wp_remote_get( $url );

if ( is_wp_error( $response ) ) {
    echo '<p>Error al conectar con la API.</p>';
    return;
}

$data = json_decode( wp_remote_retrieve_body( $response ), true );

if ( empty( $data ) ) {
    echo '<p>No hay datos disponibles.</p>';
    return;
}
?>

<table style="width:100%; border-collapse:collapse; text-align:left;">
    <thead>
        <tr>
            <th style="border-bottom:1px solid #ccc;">Zona</th>
            <th style="border-bottom:1px solid #ccc;">Traslados</th>
            <th style="border-bottom:1px solid #ccc;">Porcentaje</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ( $data as $zona ): ?>
            <tr>
                <td><?php echo esc_html( $zona['zona'] ); ?></td>
                <td><?php echo esc_html( $zona['traslados'] ); ?></td>
                <td><?php echo esc_html( $zona['porcentaje'] ); ?>%</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>