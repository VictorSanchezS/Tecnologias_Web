<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9</title>
</head>

<body>
    <h1>Ejercicio 9</h1>

    <p>
        <strong>
            Ingresar dos números enteros N1 y N2 mediante formulario web. Si el primero es diferente
            de cero y el segundo es negativo, reportar el cubo de su producto de N1 y N2. Si el primero
            es diferente de cero y el segundo es positivo reportar el cuadro de su resta de N1 y N2. Si
            no mostrar un mensaje “No corresponde”.
        </strong>
    </p>

    <form method="post">
        <label for="n1">Ingrese el primer número entero:</label>
        <input type="number" name="n1" id="n1" required>
        <br>
        <label for="n2">Ingrese el segundo número entero:</label>
        <input type="number" name="n2" id="n2" required>
        <br>
        <input type="submit" name="submit" value="Calcular">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $n1 = (int)$_POST['n1'];
        $n2 = (int)$_POST['n2'];

        if ($n1 != 0) {
            if ($n2 < 0) {
                $result = $n1 * $n1 * $n1 * $n2 * $n2 * $n2;
                // $n = $n1 * $n2;
                // $result = pow($n,3);
                echo "<p>El cubo del producto de $n1 y $n2 es: $result</p>";
            } elseif ($n2 > 0) {
                $result = ($n1 - $n2) * ($n1 - $n2);
                // $n = $n1 - $n2;
                // $result = pow($n,2);
                echo "<p>El cuadrado de la resta de $n1 y $n2 es: $result</p>";
            } else {
                echo "<p>No corresponde.</p>";
            }
        } else {
            echo "<p>No corresponde.</p>";
        }
    }
    ?>
</body>

</html>