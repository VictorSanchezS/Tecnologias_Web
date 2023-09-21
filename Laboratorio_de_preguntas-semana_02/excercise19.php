<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 19</title>
</head>

<body>
    <h1>Ejercicio 19</h1>
    <p>
        <strong>
            Una empresa tiene tres categorías de trabajadores: funcionarios, administrativos y obreros.
            El sueldo básico de un funcionario es 1000 soles/hora, de un administrativo es 300
            soles/hora y de los obreros 20 soles/hora. Determinar el sueldo neto de un trabajador si
            sobre su sueldo básico se le descuenta el 15% por impuestos a los funcionarios y
            administrativos. Además, a cualquier trabajador si tienen hijos se le otorga 200 soles
            adicionales a su sueldo neto.
        </strong>
    </p>
    <form method="post">
        <label for="category">Seleccione la categoría del trabajador:</label>
        <select name="category" id="category" required>
            <option value="funcionario">Funcionario</option>
            <option value="administrativo">Administrativo</option>
            <option value="obrero">Obrero</option>
        </select>
        <br>
        <label for="hours">Ingrese la cantidad de horas trabajadas:</label>
        <input type="number" step="0.01" name="hours" id="hours" required>
        <br>
        <label for="children">¿Tiene hijos?</label>
        <input type="checkbox" name="children" id="children">
        <br>
        <input type="submit" name="submit" value="Calcular">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $category = $_POST['category'];
        $hours = (float)$_POST['hours'];
        $children = isset($_POST['children']);

        $base_salary = 0;

        switch ($category) {
            case 'funcionario':
                $base_salary = $hours * 1000;
                break;
            case 'administrativo':
                $base_salary = $hours * 300;
                break;
            case 'obrero':
                $base_salary = $hours * 20;
                break;
        }

        $income_tax = ($category == 'funcionario' || $category == 'administrativo') ? 0.15 : 0;

        $net_salary = $base_salary * (1 - $income_tax);

        if ($children) {
            $net_salary += 200;
        }

        echo "<p>Sueldo básico: S/.$base_salary</p>";
        echo "<p>Impuesto a la renta ($income_tax%): S/." . ($base_salary * $income_tax) . "</p>";
        echo "<p>Sueldo neto: S/.$net_salary</p>";
    }
    ?>
</body>

</html>