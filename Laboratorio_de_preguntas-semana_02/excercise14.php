<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 14</title>
</head>

<body>
    <h1>Ejercicio 14</h1>

    <p>
        <strong>
            Determinar si un número entero positivo cualquiera, es múltiplo de 7 y 3 a la vez. No se
            aceptan valores menores que 0.
        </strong>
    </p>

    <form method="post">
        <label for="number">Ingrese un número entero positivo:</label>
        <input type="number" name="numero" id="numero" min="1" required>
        <br>
        <input type="submit" name="submit" value="Verificar">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $number = (int)$_POST['numero'];

        if ($number > 0) {
            if ($number % 7 == 0 && $number % 3 == 0) {
                echo "<p>$number es múltiplo de 7 y 3 a la vez.</p>";
            } else {
                echo "<p>$number no es múltiplo de 7 y 3 a la vez.</p>";
            }
        } else {
            echo "<p>Por favor, ingrese un número entero positivo mayor que 0.</p>";
        }
    }
    ?>
</body>

</html>