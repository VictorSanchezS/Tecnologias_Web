<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>

<body>
    <h1>Ejercicio 6</h1>

    <p>
        <strong>
            Dada la figura, calcular el área sombreada, sabiendo el valor del radio es un valor positivo
            cualquiera ingresado desde un formulario.
        </strong>
    </p>

    <form method="post">
        <label for="variable1">Ingrese el radio de circulo:</label>
        <input step="any" type="number" name="radius" required><br><br>

        <input type="submit" value="Calcular">
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        #Obtenemos el valor del radio
        $radius = (float) $_POST['radius'];

        # Elevamos radio al cuadrado con la función pow()
        $radius_squared = pow($radius, 2);

        # La formula para calcular el área del circulo es PI * Radio ²
        $area = pi() * $radius_squared;

        # Mostramos el resultado
        echo "<p>El área del círculo es: $area</p>";
    }


    ?>
</body>

</html>