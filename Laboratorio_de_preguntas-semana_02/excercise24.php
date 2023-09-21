<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 24</title>
</head>

<body>
    <h1>Ejercicio 24</h1>
    <p>
        <strong>
            Leer un número entero positivo N y reportar la suma de sus dígitos.
        </strong><br>
        Ejemplo: La suma de los dígitos del número 4753 es 19.
    </p>
    <form method="post" action="">
        <label for="number">Ingrese un número entero positivo:</label>
        <input type="number" name="number" id="number" required>
        <br>
        <input type="submit" name="submit" value="Calcular Suma de Dígitos">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $number = (int)$_POST['number'];

        if ($number >= 0) {
            $sum = 0;
            $originalNumber = $number;

            while ($number > 0) {
                $digit = $number % 10; // Obtener el último dígito
                $sum += $digit; // Sumar el dígito a la suma
                $number = (int)($number / 10); // Eliminar el último dígito

                //La suma de 4753 es 19
            }

            echo "<p>La suma de los dígitos del número $originalNumber es $sum.</p>";
        } else {
            echo "<p>Por favor, ingrese un número entero positivo.</p>";
        }
    }
    ?>
</body>

</html>