<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 23</title>
</head>

<body>
    <h1>Ejercicio 23</h1>
    <p>
        <strong>
            Leer un número entero positivo N y reportar cuántos dígitos tiene.
        </strong><br>
        Ejemplo: El número 845621 tiene 6 dígitos.
    </p>

    <form method="post" action="">
        <label for="number">Ingrese un número entero positivo:</label>
        <input type="number" name="number" id="number" required>
        <br>
        <input type="submit" name="submit" value="Contar Dígitos">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $number = (int)$_POST['number'];

        if ($number >= 0) {
            $digits = strlen((string)$number);
            echo "<p>El número $number tiene $digits dígitos.</p>";
        } else {
            echo "<p>Por favor, ingrese un número entero positivo.</p>";
        }
    }
    ?>
</body>

</html>