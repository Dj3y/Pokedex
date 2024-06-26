<header>
    <img class="logo" src="assets/img/pokemon_logo.png" alt="logo pokemon">
    <!-- source du logo https://access.pokemon.com/images/pokemon_logo.png -->
    <nav>
        <a href="./index.php">pokedex</a>
        <?php
        session_start();
        if (empty($_SESSION['username'])) {
            echo '<a href="./login.php">login</a>';
        } else {
            echo '<a href="./users.php">Profil</a>';
        }
        ?>
        <a href="./register.php">Register</a>
    </nav>
</header>