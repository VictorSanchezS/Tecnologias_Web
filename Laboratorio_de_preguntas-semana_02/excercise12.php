<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12</title>
</head>

<body>
    <h1>Ejercicio 12</h1>

    <p>
        <strong>
            Leer tres números enteros N1, N2, N3 mediante formulario web. Si solo uno de ellos es
            negativo calcular el cubo de su suma de N1, N2 y N3, sino calcular el producto de los
            números N1, N2 y N3.
        </strong>
    </p>

    <form method="post" action="">
        <label for="n1">Ingrese el primer número entero:</label>
        <input type="number" name="n1" id="n1" required>
        <br>
        <label for="n2">Ingrese el segundo número entero:</label>
        <input type="number" name="n2" id="n2" required>
        <br>
        <label for="n3">Ingrese el tercer número entero:</label>
        <input type="number" name="n3" id="n3" required>
        <br>
        <input type="submit" name="submit" value="Calculate">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $n1 = (int)$_POST['n1'];
        $n2 = (int)$_POST['n2'];
        $n3 = (int)$_POST['n3'];

        // Contador de números negatives
        $negatives = 0;

        if ($n1 < 0) {
            $negatives++;
        }
        if ($n2 < 0) {
            $negatives++;
        }
        if ($n3 < 0) {
            $negatives++;
        }

        if ($negatives == 1) {
            // Solo un número es negativo, calcular el cubo de la suma
            $add = $n1 + $n2 + $n3;
            $result = $add * $add * $add;
            //$result = pow($add,3);

            echo "<p>El cubo de la suma de $n1, $n2 y $n3 es: $result</p>";
        } else {
            // Todos los números son positivos, calcular el producto
            $mult = $n1 * $n2 * $n3;
            echo "<p>El producto de $n1, $n2 y $n3 es: $mult</p>";
        }
    }
    ?>
</body>

</html>