<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 26</title>
</head>

<body>
    <h1>Ejercicio 26</h1>
    <p>
        <strong>
            Leer un número entero positivo N y reportar obligatoriamente en este orden: <br>
            a) Primer sus dígitos pares indicando cuales son. <br>
            b) Segundo la cantidad de ceros. <br>
            c) Finalmente, los dígitos impares indicando su suma <br><br>
        </strong>
        Ejemplo: <br>
        Numero: 1458 <br>
        Dígitos pares: 4 8 <br>
        Cantidad de ceros: 0 <br>
        Dígitos impares: 1 5 <br>
        Suma de dígitos impares: 6
    </p>
    <form method="post" action="">
        <label for="number">Ingrese un número entero positivo:</label>
        <input type="number" name="number" id="number" required>
        <br>
        <input type="submit" name="submit" value="Generar Reporte">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $number = (int)$_POST['number'];

        if ($number >= 0) {
            $evenDigits = array();
            $zeroCount = 0;
            $oddDigits = array();
            $oddSum = 0;

            while ($number > 0) {
                $digit = $number % 10; // Obtener el último dígito

                if ($digit % 2 == 0) { // Verificar si es par
                    $evenDigits[] = $digit; // Agregar el dígito par al array
                } elseif ($digit == 0) { // Verificar si es cero
                    $zeroCount++;
                } else { // Si no es par ni cero, es impar
                    $oddDigits[] = $digit; // Agregar el dígito impar al array
                    $oddSum += $digit; // Sumar el dígito impar a la suma
                }

                $number = (int)($number / 10); // Eliminar el último dígito
            }

            echo "<p>Número: $_POST[number]</p>";
            echo "<p>Dígitos pares: " . implode(" ", $evenDigits) . "</p>";
            echo "<p>Cantidad de ceros: $zeroCount</p>";
            echo "<p>Dígitos impares: " . implode(" ", $oddDigits) . "</p>";
            echo "<p>Suma de dígitos impares: $oddSum</p>";
        } else {
            echo "<p>Por favor, ingrese un número entero positivo.</p>";
        }
    }
    ?>
</body>

</html>