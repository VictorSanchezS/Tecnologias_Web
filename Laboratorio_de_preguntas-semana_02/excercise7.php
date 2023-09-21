<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>

<body>
    <h1>Ejercicio 7</h1>

    <p>
        <strong>
            Ingresar nota y sexo de un alumno mediante formulario web, e indicar si es: <br><br>
            a) Alumno hombre aprobado. <br>
            b) Alumno mujer desaprobado. <br>
            c) Ninguna de las anteriores. <br>
        </strong>
    </p>

    <form method="POST">
        <label for="score">Nota:</label>
        <input step="any" type="number" name="score" id="score" min="0" max="20" step="0.01" required>

        <br><br>

        <label for="gender">Género:</label>
        <input type="radio" name="gender" value=1> Masculino
        <input type="radio" name="gender" value=0> Femenino<br>

        <!-- <select name="genero" id="genero">
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
        </select> -->

        <br><br>

        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $score = (float) $_POST["score"];
        $gender = $_POST["gender"];

        if ($gender == '1' && $score >= 10.5) { // Caso 1: Hombre y aprobado
            echo "<p>El alumno(a) es hombre y aprobo el curso</p>";
        } else if ($gender == '1' && $score < 10.5) { // Caso 2: Hombre y desaprobado
            echo "<p>El alumno(a) es hombre y desaprobo el curso</p>";
        } else if ($gender == '0' && $score >= 10.5) { // Caso 3: Mujer y aprobada
            echo "<p>El alumno(a) es mujer y aprobo el curso</p>";
        } elseif ($gender == '0' && $score < 10.5) { // Caso 4: Mujer y aprobada
            echo "<p>El alumno(a) es mujer y desaprobo el curso</p>";
        }
    }
    ?>

</body>

</html>