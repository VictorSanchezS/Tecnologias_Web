<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>

<body>
    <h1>Ejercicio 8</h1>

    <p>
        <strong>
            Ingresar un número N entero positivo de 4 dígitos mediante formulario web. Comprobar si
            la primera cifra de N es par o impar.
        </strong>
    </p>

    <form method="post">
        <label for="number">Ingrese un número de 4 dígitos:</label>
        <input type="text" name="number" id="number" maxlength="4" required>
        <input type="submit" name="submit" value="Verificar">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $number = $_POST['number'];

        // Verificar si el número tiene 4 dígitos
        if (strlen($number) == 4 && is_numeric($number)) {
            $firstDigit = (int) $number[0];

            // Verificar si el primer dígito es par o impar
            if ($firstDigit % 2 == 0) {
                echo "<p>El primer dígito $firstDigit es PAR.</p>";
            } else {
                echo "<p>El primer dígito $firstDigit es IMPAR.</p>";
            }
        } else {
            echo "<p>Por favor, ingrese un número entero positivo de 4 dígitos.</p>";
        }
    }
    ?>
</body>

</html>