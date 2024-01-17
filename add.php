<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pokémon Card</title>
    <link rel="stylesheet" href="style.css">
</head>
<h3>Add a new card</h3>
<br>
<form method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <br>

    <label for="amount">Amount:</label>
    <input type="number" id="amount" name="amount" required>
    <br>

    <label for="type">Type:</label>
    <input type="text" id="type" name="type" required>
    <br>

    <button type="submit" name="submit">Submit</button>
</form>