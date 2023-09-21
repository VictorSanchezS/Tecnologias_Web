<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 17</title>
</head>

<body>
    <h1>Ejercicio 17</h1>
    <p>
        <strong>Una empresa tiene tres categorías de trabajadores: funcionarios, administrativos y obreros.
            Cada uno de ellos tiene formas de pago diferentes. Un funcionario recibe 1500 soles por
            cada año que lleva desempeñándose en dicho cargo. Un administrativo recibe 800 soles
            siempre, y los obreros ganan en función a su producción, es decir, por cada docena
            producida reciben 20 soles. Determinar el sueldo neto de un trabajador, si sobre su sueldo
            básico se le descuenta el 15% por impuesto a la renta.
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
        <label for="years">Años de experiencia (si aplica):</label>
        <input type="number" name="years" id="years">
        <br>
        <label for="production">Producción en docenas (si aplica):</label>
        <input type="number" name="production" id="production">
        <br>
        <input type="submit" name="submit" value="Calcular">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $category = $_POST['category'];
        $years = isset($_POST['years']) ? (int)$_POST['years'] : 0;
        $production = isset($_POST['production']) ? (int)$_POST['production'] : 0;
        $income_tax = 0.15; // 15% de impuesto a la renta

        $base_salary = 0;

        switch ($category) {
            case 'funcionario':
                $base_salary = $years * 1500;
                break;
            case 'administrativo':
                $base_salary = 800;
                break;
            case 'obrero':
                $base_salary = $production * 20;
                break;
        }

        $net_salary = $base_salary * (1 - $income_tax);

        echo "<p>Sueldo base: $$base_salary</p>";
        echo "<p>Impuesto a la renta (15%): S/." . ($base_salary * $income_tax) . "</p>";
        echo "<p>Sueldo neto: $$net_salary</p>";
    }
    ?>
</body>

</html>