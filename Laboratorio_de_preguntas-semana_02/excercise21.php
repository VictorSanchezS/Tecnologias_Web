<?php
/*
Para determinar la fila y columna correspondientes a un boleto dado, puedes utilizar divisiones y operaciones matemáticas simples. 
La relación entre el número del boleto y la fila y columna es la siguiente:
La columna se calcula como el residuo de la división del número del boleto entre 500. 
Si el residuo es 0, la columna es 500; de lo contrario, la columna es igual al residuo.
La fila se calcula dividiendo el número del boleto entre 500 y redondeando siempre hacia arriba (usando la función ceil en PHP). 
Esto te dará la fila correspondiente.
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 21</title>
</head>

<body>
    <h1>Ejercicio 21</h1>
    <p>
        <strong>
            La tribuna de un estadio está dividida en 50 filas y 500 columnas. Y cada asiento tiene su
            numeración correlativa del 1 al 25000, tal como se muestra en la gráfica. Los boletos
            también tienen la numeración correlativa del 1 al 25000 que corresponde a cada asiento de
            la tribuna.
            Determinar el número de fila y el número de columna que le correspondería a un usuario
            que compra un boleto.
        </strong>
    </p>
    <table border="1">
        <tbody>
            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>..</td>
                <td>..</td>
                <td>497</td>
                <td>498</td>
                <td>499</td>
                <td>500</td>
            </tr>
            <tr>
                <td>501</td>
                <td>502</td>
                <td>503</td>
                <td>504</td>
                <td>..</td>
                <td>..</td>
                <td>997</td>
                <td>998</td>
                <td>999</td>
                <td>1000</td>
            </tr>
            <tr>
                <td>1001</td>
                <td>1002</td>
                <td>1003</td>
                <td>1004</td>
                <td>..</td>
                <td>..</td>
                <td>1497</td>
                <td>1498</td>
                <td>1499</td>
                <td>1500</td>
            </tr>
            <tr>
                <td>1501</td>
                <td>1502</td>
                <td>1503</td>
                <td>1504</td>
                <td>..</td>
                <td>..</td>
                <td>1997</td>
                <td>1998</td>
                <td>1999</td>
                <td>2000</td>
            </tr>
            <tr>
                <td>..</td>
                <td>..</td>
                <td>..</td>
                <td>..</td>
                <td>..</td>
                <td>..</td>
                <td>..</td>
                <td>..</td>
                <td>..</td>
                <td>..</td>
            </tr>
            <tr>
                <td>24001</td>
                <td>24002</td>
                <td>24003</td>
                <td>24004</td>
                <td>..</td>
                <td>..</td>
                <td>24497</td>
                <td>24498</td>
                <td>24499</td>
                <td>24500</td>
            </tr>
            <tr>
                <td>24501</td>
                <td>24502</td>
                <td>24503</td>
                <td>24504</td>
                <td>..</td>
                <td>..</td>
                <td>24997</td>
                <td>24998</td>
                <td>24999</td>
                <td>25000</td>
            </tr>
        </tbody>
    </table>
    <br>
    <form method="post" action="">
        <label for="ticket_number">Ingrese el número del boleto:</label>
        <input type="number" name="ticket_number" id="ticket_number" required>
        <br>
        <input type="submit" name="submit" value="Calculate">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $ticket_number = (int)$_POST['ticket_number'];

        if ($ticket_number >= 1 && $ticket_number <= 25000) {
            $column = $ticket_number % 500;
            if ($column == 0) {
                $column = 500;
            }

            $row = ceil($ticket_number / 500); //La funcion ceil redondea hacia arriba, por ejemplo, si el resultado es 3.002 se redondea a 4.

            echo "<p>Boleto N° $ticket_number: le corresponde la FILA = $row y COLUMNA = $column.</p>";
        } else {
            echo "<p>Por favor, ingrese un número de boleto válido entre 1 y 25000.</p>";
        }
    }
    ?>
</body>

</html>