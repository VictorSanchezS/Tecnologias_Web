<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 22</title>
</head>

<body>
    <h1>Ejercicio 22</h1>
    <p>
        <strong>
            Leer un número entero positivo N y reportar los N términos de la serie: 1,2,4,7,11,16……..
            Además, debe reportar la suma de los términos.
        </strong>
    </p>
    
    <form method="post" action="">
        <label for="n">Ingrese un número entero positivo N:</label>
        <input type="number" name="n" id="n" required>
        <br>
        <input type="submit" name="submit" value="Generate Series">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $n = (int)$_POST['n'];

        if ($n > 0) {
            $series = array();
            $sum = 0;
            $value = 1;

            for ($i = 0; $i < $n; $i++) {
                $series[] = $value;
                $sum += $value;
                $value += $i + 1; // Incremento progresivo
            }

            echo "<p>La serie generada es: " . implode(", ", $series) . "</p>"; //Implode convierte elementos de una matriz o array a una cadena
            echo "<p>La suma de los términos es: $sum</p>";
        } else {
            echo "<p>Por favor, ingrese un número entero positivo mayor que 0.</p>";
        }
    }
    ?>
</body>

</html>