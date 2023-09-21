<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>

<body>
    <h1>Ejercicio 2</h1>

    <p>
        <strong>
            Implementar un algoritmo que calcule el valor de la siguiente fórmula. Sabiendo que todos
            los valores de las variables deben ser ingresadas mediante formulario.
        </strong>
    </p>

    <form method="post">
        <label for="variable1">Valor de la variable A:</label>
        <input step="any" type="number" name="value_A" required><br><br>

        <label for="variable2">Valor de la variable B:</label>
        <input step="any" type="number" name="value_B" required><br><br>

        <label for="variable2">Valor de la variable C:</label>
        <input step="any" type="number" name="value_C" required><br><br>

        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //Entrada de datos
        $A = (float) $_POST['value_A'];
        $B = (float) $_POST['value_B'];
        $C = (float) $_POST['value_C'];

        //Proceso de datos
        $M = - ((sqrt((($B - $A) * $C) / ($B + 1 + $A))) / pow(((pow($B, 3)) + $C), 1 / 4));
        $N = sqrt(($A * $B - 5 * $C) / (sqrt(($B * $C))));
        $X = $M + $N;


        //Salida de datos
        echo "<p>El valor de M es: $M </p>";
        echo "<p>El valor de N es: $N</p>";
        echo "<p>El valor de X es: $X</p>";
    }
    ?>
</body>

</html>