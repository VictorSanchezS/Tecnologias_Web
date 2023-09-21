<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 27</title>
</head>

<body>
    <h1>Ejercicio 27</h1>
    <p>
        <strong>
            Calcular la suma de los N primeros números cúbicos. Validar que N nunca sea negativo.
        </strong>
    </p>
    <form method="post" action="">
        <label for="n">Ingrese un número entero no negativo N:</label>
        <input type="number" name="n" id="n" required>
        <br>
        <input type="submit" name="submit" value="Calcular suma">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $n = (int)$_POST['n'];

        if ($n >= 0) {
            $sum = 0;

            for ($i = 1; $i <= $n; $i++) {
                $cubic = $i * $i * $i;
                $sum += $cubic;
            }

            echo "<p>La sum de los primeros $n números cúbicos es: $sum</p>";
        } else {
            echo "<p>Por favor, ingrese un número entero no negativo.</p>";
        }
    }
    ?>
</body>

</html>