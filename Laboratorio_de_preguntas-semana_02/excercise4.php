<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>

<body>
    <h1>Ejercicio 4</h1>
    <p>
        <strong>
            Una empresa le hace los siguientes descuentos sobre el sueldo base a sus trabajadores: 2%
            por ley de política habitacional, 2.7% por Seguro Social, 1.5% por seguro paro forzoso y 5%
            por caja de ahorro. Implemente un formulario que permita ingresar el sueldo base del
            trabajador y determine el monto de cada descuento y el monto total a pagar al trabajador.
        </strong>
    </p>

    <form method="post">
        <label for="baseSalary">Ingrese el sueldo del trabajador:</label>
        <input step="any" type="number" name="baseSalary" required><br><br>

        <input type="submit" value="Calcular">
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //Entrada de datos
        $baseSalary = (float) $_POST['baseSalary'];

        //Proceso de datos
        $housingPolicyLaw = $baseSalary * 0.02;
        $socialSecurity = $baseSalary * 0.027;
        $forcedUnemploymentInsurance = $baseSalary * 0.015;
        $savingsBank = $baseSalary * 0.05;

        $realSalary = $baseSalary - $housingPolicyLaw - $socialSecurity - $forcedUnemploymentInsurance - $savingsBank;

        //Salida de datos
        echo "<p>Descuento por Ley de política habitacional: $housingPolicyLaw</p>";
        echo "<p>Descuento por Seguro social: $socialSecurity</p>";
        echo "<p>Descuento por Seguro paro forzoso: $forcedUnemploymentInsurance</p>";
        echo "<p>Descuento por Caja de ahorro: $savingsBank</p>";
        echo "<p>Salario final: $realSalary</p> ";
    }
    ?>
</body>

</html>