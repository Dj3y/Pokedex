
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
        <form class="search" action="index.php" method="post">
            <!-- <label for="name">𝒫𝑜𝓀é𝓂𝑜𝓃 𝒩𝒶𝓂𝑒:</label> -->
            <input type="text" name="name" id="name" placeholder="Search..." required>
            <button type="submit" name="search"><img class="searchBtn" src="assets/img/39d6060576a516f1dd437eafccafbdb1.gif" alt=""></button>
        </form>
        <div class="pokemon-card-container">
            <?php
            include("assets/php/engine.php");
            include("assets/php/pokemon.php");
            include("assets/php/search.php");
            ?>
        </div>
    </main>
    <footer>
        <div class="pagination">
            <?php 
            include("assets/php/pagination.php");
            ?>
        </div>
    </footer>
<?php include_once("assets/php/footer.php"); ?>
</body>
</html>