   <?php
    include("./assets/php/engine.php");
    ?>



   <!DOCTYPE html>
   <html lang="en">

   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>pokedex</title>
       <link rel="stylesheet" href="assets/css/style.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   </head>

   <body>

       <?php include_once("./assets/php/header.php"); ?>

       <?php

        if (!empty($_SESSION['username'])) {
            //($_SESSION['admin'] == 1 ? "Admin" : "Users");

            $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindParam(':username', $_SESSION['username']);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

        ?>

               <div class="page">
                   <div class="page-up">
                       <img class="page-profil-img" src="assets/pokemon/arcanine.png">
                       <div>
                           <h2>
                               <?php echo $user['username'] ?>
                           </h2>
                           <div>
                               <p class="bio">
                                   <?php echo $user['bio'] ?>
                               </p>
                               <br>
                               <button class="button" onclick="document.querySelector('dialog').showModal()">Edite bio</button>
                               <dialog>
                                   <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                       <label>Your bio:</label><br><textarea name="mytextarea"><?php echo $user['bio'] ?></textarea><br>
                                       <input class="button" type="submit" value="Save and close" class="button"><br>
                                   </form>
                               </dialog>
                           </div>
                       </div>
                   </div>
                   <div>
                       <h2>
                           Favoris
                       </h2>
                       <hr>
                       <div class="page-fav-card">
                           <?php
                            $favoris = json_decode($user['favoris']);
                            $array = &$favoris->fav;
                            if (count($array) < 1) {
                                echo "You dont have favoris";
                            } else {
                                $stmt = $conn->prepare("SELECT * FROM pokemon WHERE id = :id");
                                $stmt->bindParam(':id', $poke);


                                foreach ($array as $poke) {
                                    $stmt->execute();
                                    $pokemon = $stmt->fetch(PDO::FETCH_ASSOC);

                                    if ($pokemon !== false) {
                                        echo '<div class="pokemon-card"><a href="pokemonDetails.php?idP=' . $pokemon["id"] . '"';
                                        echo '<h2>' . $pokemon["name"] . '</h2>';
                                        echo '<img src="assets/pokemon/' . $pokemon["image"] . '" alt="' . $pokemon["name"] . '">';
                                        echo '</a></div>';
                                    } else {
                                        echo "Aucun Pokémon trouvé avec l'ID " . $poke;
                                    }
                                }
                            }
                            ?>
                       </div>
                   </div>
               </div>

       <?php
            }
            include_once("./assets/php/footer.php");
        } else {
            echo "not connected";
        }
        ?>
   </body>

   <style>
       .page {
           display: flex;
           flex-direction: column;

           margin-top: 1em;
           margin-bottom: 1em;
           margin-left: 5%;
           margin-right: 5%;

           background-color: white;
       }

       .page-up {
           display: flex;
           flex-direction: row;
       }

       hr {
           margin-top: 1em;
           margin-bottom: 2em;
       }

       h2 {
           margin: 1.2em;
       }

       .page-profil-img {
           width: 15em;
           height: 15em;
           margin: 1em;
           border: solid 2px black;
           border-radius: 1em;
       }

       .button {
           width: fit-content;
           text-transform: capitalize;
           border: none;

           font-size: 1em;
           padding: 0.5em;
           margin: 0.5em;
       }

       .button:hover {
           color: white;
           background-color: #7e7e7f;
       }

       dialog {
           width: 50%;
           height: max-content;
       }

       textarea {
           width: 100%;
           height: 15em;
           resize: none
       }

       .bio {
           margin: 1em;
           text-align: justify;
       }

       .page-fav-card {
           display: flex;
           justify-content: space-around;

       }

       .pokemon-card {
           border: solid 1px black;
           border-radius: 1em;
           margin: 1em;
           width: 15%;

           text-align: center;
       }

       .pokemon-card img {
           width: 100%;
       }

       .pokemon-card h2 {
           color: black;
           font-size: 1.2em;
       }
   </style>

   <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $stmt = $conn->prepare("UPDATE users SET bio = :bio WHERE username = :username");

        $mybio = htmlspecialchars(trim(filter_input(INPUT_POST, "mytextarea", FILTER_SANITIZE_FULL_SPECIAL_CHARS)));


        $stmt->bindParam(':bio', $mybio);
        $stmt->bindParam(':username', $_SESSION['username']);


        $stmt->execute();
    }
    ?>