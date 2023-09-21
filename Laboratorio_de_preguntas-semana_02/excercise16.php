<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 16</title>
</head>

<body>
    <h1>Ejercicio 16</h1>

    <p>
        <strong>
            El restaurante amplio sus ofertas de acuerdo a la siguiente escala de consumo. Determinar
            el importe a pagar por lo consumido, mostrando todos los importes. Para todos los casos se
            aplica un impuesto del 16%. No se acepta valores negativos.
        </strong>
    </p>

    <table border="1">
        <thead>
            <tr>
                <th>Consumo</th>
                <th>Descuento %</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Mayor a 100</td>
                <td>30%</td>
            </tr>
            <tr>
                <td>Hasta 100</td>
                <td>20%</td>
            </tr>
            <tr>
                <td>Hasta 60</td>
                <td>15%</td>
            </tr>
            <tr>
                <td>Hasta 30</td>
                <td>10%</td>
            </tr>
        </tbody>
    </table>
    
    <form method="post">
        <label for="pay">Ingrese el monto del pago en soles:</label>
        <input type="number" step="0.01" name="pay" id="pay" required>
        <br>
        <input type="submit" name="submit" value="Calcular">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $pay = (float)$_POST['pay'];
        $tax = 0.16; // 16% de tax por defecto

        if ($pay < 0) {
            echo "<p>No se aceptan valores negativos.</p>";
        } else {
            $discount = 0;

            if ($pay > 100) {
                $discount = 0.30; // 30% de descuento para pago mayor a 100
            } elseif ($pay <= 100 && $pay > 60) {
                $discount = 0.20; // 20% de descuento para pago hasta 100
            } elseif ($pay <= 60 && $pay > 30) {
                $discount = 0.15; // 15% de descuento para pago hasta 60
            } elseif ($pay <= 30) {
                $discount = 0.10; // 10% de descuento para pago hasta 30
            }

            $payDiscount = $pay * $discount;
            $pay_whitout_tax = $pay - $payDiscount;
            $pay_whit_tax = $pay_whitout_tax * (1 + $tax);

            echo "<p>Descuento: S/.$payDiscount</p>";
            echo "<p>Pago sin impuesto: S/.$pay_whitout_tax</p>";
            echo "<p>Pago con impuesto:: S/.$pay_whit_tax</p>";
        }
    }
    ?>
</body>

</html>