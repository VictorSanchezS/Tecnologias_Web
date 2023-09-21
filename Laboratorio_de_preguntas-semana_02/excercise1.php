<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>
    <h1>Ejercicio 1</h1>
    <p>
        <strong>
            Resolver la siguiente ecuación debiendo calcular el valor de X, en donde g es una constante
            de valor 1.5. El valor de las variables a, b y c debe ser ingresado mediante formulario web.
        </strong>
    </p>

    <form method="post">
        <label for="variable1">Valor de la variable a:</label>
        <input step="any" type="number" name="value_a" required><br><br>

        <label for="variable2">Valor de la variable b:</label>
        <input step="any" type="number" name="value_b" required><br><br>

        <label for="variable2">Valor de la variable c:</label>
        <input step="any" type="number" name="value_c" required><br><br>

        <input type="submit" value="Calcular">
    </form>

    <?php

    //define('g',1.5);
    const g = 1.5;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //Entrada de datos
        $a = (float) $_POST['value_a'];
        $b = (float) $_POST['value_b'];
        $c = (float) $_POST['value_c'];

        //Proceso de datos
        $x = ((pow($b, 2) - ($c * 10)) / ($a * $b + 1)) + g - ($a / $b);

        //Salida de datos
        echo "<p>El valor de x es: $x</p>";
    }
    ?>
</body>

</html>