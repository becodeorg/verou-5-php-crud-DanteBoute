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

<a href="?action=create" class="edit-button">Add Card</a>
<ul>
    <?php foreach ($cards as $card) : ?>
        <li>
            Name: <?= $card['name'] ?>,
            Amount: <?= $card['amount'] ?>,
            Type: <?= $card['type'] ?>
            <a href="?action=edit&id=<?= $card['id'] ?>">Edit</a>
            <a href="?action=delete&id=<?= $card['id'] ?>">Delete</a>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>