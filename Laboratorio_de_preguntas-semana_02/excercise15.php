<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 15</title>
</head>

<body>
    <h1>Ejercicio 15</h1>

    <p>
        <strong>
            Compro L libros a S soles cada uno y R reglas a Z soles cada uno. ¿Cuánto pago por cada
            producto? ¿Cuánto pago en total? ¿Por cuál producto pago más?
        </strong>
    </p>

    <form method="post">
        <label for="books">Número de books:</label>
        <input type="number" name="books" id="books" required>
        <br>
        <label for="book_price">Precio de cada libro en Soles:</label>
        <input type="number" step="0.01" name="book_price" id="book_price" required>
        <br>
        <label for="rules">Número de rules:</label>
        <input type="number" name="rules" id="rules" required>
        <br>
        <label for="rule_price">Precio de cada regla en Soles:</label>
        <input type="number" step="0.01" name="rule_price" id="rule_price" required>
        <br>
        <input type="submit" name="submit" value="Calcular">
    </form>

    <?php
    if (isset($_POST['submit'])) {

        //Entrada de datos
        $books = (int)$_POST['books'];
        $book_price = (float)$_POST['book_price'];
        $rules = (int)$_POST['rules'];
        $rule_price = (float)$_POST['rule_price'];

        //Proceso de datos
        $total_books = $books * $book_price;
        $total_rules = $rules * $rule_price;
        $total_pay = $total_books + $total_rules;

        //Salida de datos
        echo "<p>Precio por cada libro: S/.$book_price</p>";
        echo "<p>Precio por cada regla: S/.$rule_price</p>";
        echo "<p>Total pagado por libros: S/.$total_books</p>";
        echo "<p>Total pagado por reglas: S/.$total_rules</p>";
        echo "<p>Total en pagar: S/.$total_pay</p>";

        if ($total_books > $total_rules) {
            echo "<p>Pagaste más por los libros.</p>";
        } elseif ($total_rules > $total_books) {
            echo "<p>Pagaste más por las reglas.</p>";
        } else {
            echo "<p>Pagaste la misma cantidad por los libros y por las reglas.</p>";
        }
    }
    ?>
</body>

</html>