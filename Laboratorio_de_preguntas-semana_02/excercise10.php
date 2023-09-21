<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 10</title>
</head>

<body>
    <h1>Ejercicio 10</h1>

    <p>
        <strong>
            Leer dos números enteros N1, N2 mediante formulario web. Si alguno de ellos es negativo
            y ninguno es cero, calcular su división N1/N2, sino calcular la resta de N1-N2.
        </strong>
    </p>

    <form method="post">
        <label for="n1">Ingrese el primer número entero:</label>
        <input type="number" name="n1" id="n1" required>
        <br>
        <label for="n2">Ingrese el segundo número entero:</label>
        <input type="number" name="n2" id="n2" required>
        <br>
        <input type="submit" name="submit" value="Calculate">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $n1 = (int)$_POST['n1'];
        $n2 = (int)$_POST['n2'];

        if ($n1 != 0 && $n2 != 0) {
            if ($n1 < 0 || $n2 < 0) {
                $result = $n1 / $n2;
                echo "<p>La división de $n1 entre $n2 es: $result</p>";
            } else {
                $result = $n1 - $n2;
                echo "<p>La resta de $n1 y $n2 es: $result</p>";
            }
        } else {
            echo "<p>No corresponde.</p>";
        }
    }
    ?>
</body>

</html>