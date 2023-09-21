<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 13</title>
</head>

<body>
    <h1>Ejercicio 13</h1>

    <p>
        <strong>
            La forma general de una ecuación de primer grado es: AX +B = 0. Resolver ecuaciones de
            este tipo donde se debe ingresar los coeficientes A y B mediante formulario web. Es
            necesario que A nunca tome el valor de 0.
        </strong>
    </p>

    <form method="post">
        <label for="coefficient_a">Ingrese el coeficiente A (A nunca debe ser 0):</label>
        <input type="number" name="coefficient_a" id="coefficient_a" required>
        <br>
        <label for="coefficient_b">Ingrese el coeficiente B:</label>
        <input type="number" name="coefficient_b" id="coefficient_b" required>
        <br>
        <input type="submit" name="submit" value="solve">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $coefficient_a = (float)$_POST['coefficient_a'];
        $coefficient_b = (float)$_POST['coefficient_b'];

        if ($coefficient_a != 0) {
            $solution = -$coefficient_b / $coefficient_a;
            echo "<p>La solución de la ecuación $coefficient_a X + $coefficient_b = 0 es X = $solution</p>";
        } else {
            echo "<p>El coeficiente A no puede ser igual a 0. Intente nuevamente.</p>";
        }
    }
    ?>
</body>

</html>