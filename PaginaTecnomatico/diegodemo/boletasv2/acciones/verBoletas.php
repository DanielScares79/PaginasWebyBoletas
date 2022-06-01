<?php
if (!defined('ENABLE_TM')) exit('ACCESO PROHIBIDO.');

function calcularPrecioIVA($precio, $iva = 19, $sinsuma = false) {
    $precioIva = ($precio * $iva / 100);

    $precioNormalizado = floatval(sprintf("%.2f", $precioIva));

    return $sinsuma ? $precioNormalizado : $precio + $precioNormalizado;
}

$fmt = new NumberFormatter('es_ES', NumberFormatter::CURRENCY);
$sumaBoletas = 0;
if ($resultado = $mysqli->query("SELECT * FROM boletas")) {

    if ($consulta->errno) die($consulta->error);
?>
    <h1>Registro de boletas.</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Valor bruto</th>
                <th scope="col">Valor neto</th>
                <th scope="col">Valor IVA</th>
                <th scope="col">Fecha</th>
            </tr>
        </thead>
        <tbody>
        <?php
        //Ejemplo para imprimir los datos. El bucle recorre todos los registros.
        while ($fila = $resultado->fetch_assoc()) {
            $sumaBoletas = $sumaBoletas + (int)$fila['valorboleta'];
            echo '<tr><th scope="row">' . $fila['numboleta'] . '</th>
      <td>' . $fmt->formatCurrency($fila['valorboleta'], "CLP") . '</td>
            <td>' . $fmt->formatCurrency(calcularPrecioIVA($fila['valorboleta']), "CLP") . '</td>
            <td>' . $fmt->formatCurrency(calcularPrecioIVA($fila['valorboleta'], 19, true), "CLP") . '</td>
      <td>' . $fila['mes'] . '</td>
    </tr>';
        }
        echo '  </tbody>
</table>
<hr/>
<div class="alert alert-secondary">Ganancias totales: ' . $fmt->formatCurrency($sumaBoletas, "CLP") . '<br/>Impuestos totales pagados: ' . $fmt->formatCurrency(calcularPrecioIVA($sumaBoletas, "19", true), "CLP") . '<br/>Ganancias este mes: Algun dia.</div>
';
    }
        ?>