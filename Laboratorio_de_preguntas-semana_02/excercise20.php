<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 20</title>
</head>

<body>
    <h1>Ejercicio 20</h1>
    <p>
        <strong>
            El sueldo semanal de los empleados en una fábrica se calcula de la siguiente forma:
            Por su categoría: los estables reciben 15 soles por hora. Contratados 10 soles por hora.
            Si realiza turno de noche esa semana recibe una bonificación de 100 soles.
            Por cada falta se le descuenta 20 soles.
            Por cada tardanza se le descuenta 5 soles.
            Se pide mostrar el detalle de los pagos y descuentos del empleado.
        </strong>
    </p>
    
    <form method="post">
        <label for="category">Seleccione la categoría del empleado:</label>
        <select name="category" id="category" required>
            <option value="permanent">Estable</option>
            <option value="contract">Contratado</option>
        </select>
        <br>
        <label for="hours_worked">Ingrese la cantidad de horas trabajadas:</label>
        <input type="number" step="0.01" name="hours_worked" id="hours_worked" required>
        <br>
        <label for="night_shift">¿Realizó turno de noche esta semana?</label>
        <input type="checkbox" name="night_shift" id="night_shift">
        <br>
        <label for="absences">Ingrese la cantidad de faltas:</label>
        <input type="number" name="absences" id="absences" min="0">
        <br>
        <label for="tardiness">Ingrese la cantidad de tardanzas:</label>
        <input type="number" name="tardiness" id="tardiness" min="0">
        <br>
        <input type="submit" name="submit" value="Calculate">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $category = $_POST['category'];
        $hours_worked = (float)$_POST['hours_worked'];
        $night_shift = isset($_POST['night_shift']);
        $absences = isset($_POST['absences']) ? (int)$_POST['absences'] : 0;
        $tardiness = isset($_POST['tardiness']) ? (int)$_POST['tardiness'] : 0;

        $hourly_rate = ($category == 'permanent') ? 15 : 10;
        $night_shift_bonus = ($night_shift) ? 100 : 0;
        $absence_penalty = $absences * 20;
        $tardiness_penalty = $tardiness * 5;

        $base_salary = $hours_worked * $hourly_rate;
        $total_salary = $base_salary + $night_shift_bonus - $absence_penalty - $tardiness_penalty;

        echo "<p>Sueldo base: S/.$base_salary</p>";
        echo "<p>Bonificación por turno de noche: S/.$night_shift_bonus</p>";
        echo "<p>Descuento por faltas: S/.$absence_penalty</p>";
        echo "<p>Descuento por tardanzas: S/.$tardiness_penalty</p>";
        echo "<p>Sueldo semanal total: S/.$total_salary</p>";
    }
    ?>
</body>

</html>