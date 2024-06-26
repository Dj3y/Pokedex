    <?php include_once("./assets/php/header.php"); ?>

    <?php
    include("./assets/php/engine.php");

    if (!empty($_SESSION['username'])) {
        //($_SESSION['admin'] == 1 ? "Admin" : "Users");

    ?>

        <div>
            <div>
                <img src="../pokemon/arcanine.png">
                <div>
                    <h2>
                        <?php echo $_SESSION['username'] ?>
                    </h2>
                    <p>
                        ma description de mon compte magnifique car j'aime trop les pokemon, ils sont vraiment trop mims, bon il faut que ce text soit long pour faire un test de mise en page
                    </p>
                </div>
            </div>
            <div>
                <h2>
                    Favoris
                </h2>
                <hr>
                <!-- favoris -->
            </div>
        </div>

    <?php

        include_once("./assets/php/footer.php");
    } else {
        echo "not connected";
    }
