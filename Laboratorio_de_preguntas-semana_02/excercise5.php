<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>

<body>
    <h1>Ejercicio 5</h1>

    <p>
        <strong>
            Construir un formulario que permita resolver el siguiente caso. Usando un teléfono público,
            una llamada local cuesta 1.00 sol/minuto, una llamada nacional cuesta 2.00 soles/minuto, y
            a nivel internacional cuesta 8 soles/minuto. Si se hace una llamada de L minutos a nivel local,
            N minutos a nivel nacional, Y minutos a nivel internacional. ¿Cuánto gastó en total?
        </strong>
    </p>

    <form method="post">
        <label for="variable1">Minutos en llamda Local:</label>
        <input type="number" name="lCalls" required><br><br>

        <label for="variable2">Minutos en llamda Nacional:</label>
        <input type="number" name="nCalls" required><br><br>

        <label for="variable2">Minutos en llamda Internacional:</label>
        <input type="number" name="iCalls" required><br><br>

        <input type="submit" value="Calcular">
    </form>


    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //Entrada de datos
        $lCalls = (int) $_POST['lCalls'];
        $nCalls = (int) $_POST['nCalls'];
        $iCalls = (int) $_POST['iCalls'];

        //Proceso de datos
        $npCalls = $nCalls * 2;
        $ipCalls = $iCalls * 8;

        $tpCalls = $lCalls + $npCalls + $ipCalls;

        //Salida de datos
        echo "<p>Pago de llamada Local: S/.$lCalls</p>";
        echo "<p>Pago de llamada Nacional: S/.$npCalls</p>";
        echo "<p>Pago de llamada Internacional: S/.$ipCalls</p>";

        echo "<p>Pago total: S/.$tpCalls</p>";
    }

    ?>

</body>

</html>