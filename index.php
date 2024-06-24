<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Ajout du fichier header -->
    <main>
        <form action="assets/php/search.php" method="post">
 <label for="name">Pokémon Name:</label>
    <input type="text" name="name" id="id" required>
    <button name="search">Search</button>
</form>
<div class="pokemon-card-container">
        <?php
        if (isset($_POST['name'])) {
            include('assets/php/search.php');
        }
        ?>
    </div>
    </main>
    <!-- Ajout du fichier footer -->
    <?php include_once("assets/php/footer.php"); ?>
</body>
</html>