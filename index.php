
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include_once("assets/php/header.php"); ?>
    <main>
        <form action="index.php" method="post">
            <label for="name">Pokémon Name:</label>
            <input type="text" name="name" id="name" required>
            <button type="submit" name="search">Search</button>
        </form>
        <div class="pokemon-card-container">
            <?php
            // connexion DB pour docker
            include("assets/php/engine.php");
            // connexion DB pour XAMPP - MAMP - LAMP
            // include("assets/php/dbconnect.php");
            include("assets/php/pokemon.php");
            include("assets/php/search.php");
            ?>
        </div>
    </main>
<?php include_once("assets/php/footer.php"); ?>
</body>
</html>
