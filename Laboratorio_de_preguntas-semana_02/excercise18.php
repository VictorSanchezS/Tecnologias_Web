<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 18</title>
</head>

<body>
    <h1>Ejercicio 18</h1>
    <p>
        <strong>
            Los trabajadores de una fábrica tienen 3 turnos: mañana, tarde y noche. La tarifa normal
            corresponde a los turnos de mañana y tarde, mientras que de noche son 30% mayores.
            Implemente un algoritmo en PHP utilizando formularios web que permita ingresar el
            número de horas diarias laboradas por un trabajador, la tarifa normal por hora y el turno en
            que trabajó el trabajador y calcule el salario semanal.
        </strong>
    </p>
    
    <form method="post">
        <label for="hours">Ingrese el número de horas diarias laboradas:</label>
        <input type="number" step="0.01" name="hours" id="hours" required>
        <br>
        <label for="rate">Ingrese la tarifa normal por hora:</label>
        <input type="number" step="0.01" name="rate" id="rate" required>
        <br>
        <label for="shift">Seleccione el turno:</label>
        <select name="shift" id="shift" required>
            <option value="morning">Mañana</option>
            <option value="afternoon">Tarde</option>
            <option value="night">Noche</option>
        </select>
        <br>
        <input type="submit" name="submit" value="Calcular">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $hours = (float)$_POST['hours']; //horas
        $rate = (float)$_POST['rate']; //tarifa
        $shift = $_POST['shift']; //turno

        $normal_shift_rate = $rate; //Tarifa normal por turno
        $night_shift_rate = $rate * 1.3; // Tarifa un 30% mayor para el turno de noche

        $weekly_salary = 0;

        switch ($shift) {
            case 'morning':
            case 'afternoon':
                $weekly_salary = $hours * $normal_shift_rate * 5; // 5 días laborables a la semana
                break;
            case 'night':
                $weekly_salary = $hours * $night_shift_rate * 5; // 5 días laborables a la semana
                break;
        }
        echo "<p>Salario semanal: S/.$weekly_salary</p>";
    }
    ?>
</body>

</html>