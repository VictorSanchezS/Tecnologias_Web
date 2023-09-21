<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 25</title>
</head>

<body>
    <h1>Ejercicio 25</h1>
    <p>
        <strong>
            Leer un número entero positivo N y reportar solamente sus dígitos pares e indicar la suma
            de estos dígitos.
        </strong><br>
        Ejemplo: <br>
        Número ingresado: 24358 <br>
        Dígitos pares: 2 4 8 <br>
        Suma: 14
    </p>
    <form method="post" action="">
        <label for="number">Ingrese un número entero positivo:</label>
        <input type="number" name="number" id="number" required>
        <br>
        <input type="submit" name="submit" value="Calcular Dígitos Pares y Suma">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $number = (int)$_POST['number'];

        if ($number >= 0) {
            $evenDigits = array();
            $sum = 0;

            while ($number > 0) {
                $digit = $number % 10; // Obtener el último dígito

                if ($digit % 2 == 0) { // Verificar si es par
                    $evenDigits[] = $digit; // Agregar el dígito par al array
                    $sum += $digit; // Sumar el dígito par a la suma
                }

                $number = (int)($number / 10); // Eliminar el último dígito
            }

            echo "<p>Número ingresado: $_POST[number]</p>";
            echo "<p>Dígitos pares: " . implode(" ", $evenDigits) . "</p>";
            echo "<p>Suma de dígitos pares: $sum</p>";
        } else {
            echo "<p>Por favor, ingrese un número entero positivo.</p>";
        }
    }
    ?>
</body>

</html>