<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>

<body>
    <h1>Ejercicio 3</h1>
    <p>
        <strong>
            Diseñe un algoritmo que sirva de apoyo al comité de evaluación del examen de admisión de
            la USS. Se debe crear un formulario que pueda solicitar un numero de respuestas correctas,
            incorrectas y en blanco, correspondientes a 01 postulante, mostrando al final su puntaje
            considerando, que por cada respuesta correcta tendrá 4 puntos, respuesta incorrecta tendrá
            -1 y respuesta en blanco tendrá 0.
        </strong>
    </p>

    <form method="post">
        <label for="variable1">Respuestas Correctas:</label>
        <input type="number" name="correctAnswers" required><br><br>

        <label for="variable2">Respuestas Incorrectas:</label>
        <input type="number" name="wrongAnswers" required><br><br>

        <label for="variable2">Respuestas en blanco:</label>
        <input type="number" name="blankAnwers" required><br><br>

        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //Entrada de datos
        $cAnswers = (int) $_POST['correctAnswers'];
        $wAnswers = (int) $_POST['wrongAnswers'];
        $bAnswers = (int) $_POST['blankAnwers'];

        //Proceso de datos
        $fs = ($cAnswers * 4) + ($wAnswers * -1) + ($bAnswers * 0);

        //Salida de datos
        echo "<p>El puntaje final es: $fs</p>";
    }
    ?>

</body>

</html>