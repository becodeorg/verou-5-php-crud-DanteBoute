<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Goodcard - track your collection of Pokémon cards</title>
</head>
<body>

<h1>My Pokémon card collection</h1>
<br>
<h3>Add a new card</h3>
<form action="edit.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <br>

    <label for="amount">Amount:</label>
    <input type="number" id="amount" name="amount" required>
    <br>

    <label for="type">Type:</label>
    <input type="text" id="type" name="type" required>
    <br>

    <button type="submit">Submit</button>
</form>

<ul>
    <?php foreach ($cards as $card) : ?>
        <li>
            Name: <?= $card['name'] ?>,
            Amount: <?= $card['amount'] ?>,
            Type: <?= $card['type'] ?>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>