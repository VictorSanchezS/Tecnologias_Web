<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 11</title>
</head>

<body>
    <h1>Ejercicio 11</h1>

    <p>
        <strong>
            Leer dos números enteros diferentes de cero mediante formulario web. Si ambos son
            positivos, entonces calcular su suma y resta. Sino calcular su producto y división.
        </strong>
    </p>

    <form method="post">
        <label for="n1">Ingrese el primer número entero (diferente de cero):</label>
        <input type="number" name="n1" id="n1" required>
        <br>
        <label for="n2">Ingrese el segundo número entero (diferente de cero):</label>
        <input type="number" name="n2" id="n2" required>
        <br>
        <input type="submit" name="submit" value="Calculate">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $n1 = (int)$_POST['n1'];
        $n2 = (int)$_POST['n2'];

        if ($n1 > 0 && $n2 > 0) {
            $add = $n1 + $n2;
            $sub = $n1 - $n2;
            echo "<p>La suma de $n1 y $n2 es: $add</p>";
            echo "<p>La resta de $n1 y $n2 es: $sub</p>";
        } else {
            $mul = $n1 * $n2;
            $div = $n1 / $n2;
            echo "<p>El producto de $n1 y $n2 es: $mul</p>";
            echo "<p>La división de $n1 entre $n2 es: $div</p>";
        }
    }
    ?>
</body>

</html>