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
        include("./assets/php/engine.php");

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
                           <p>
                               <?php echo $user['bio'] ?>
                               <br>
                               <button onclick="document.querySelector('dialog').showModal()">Edite bio</button>
                               <dialog>
                                   <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                       <label>Your bio:</label><br><input type="text" name="bio" class="inputfield" value="<?php echo $user['bio'] ?>"><br>
                                       <input type="submit" value="Save and close" class="button"><br>
                                   </form>
                               </dialog>
                           </p>
                       </div>
                   </div>
                   <div>
                       <h2>
                           Favoris
                       </h2>
                       <hr>
                       <div class="page-fav-card">
                           <!-- Favoris is here -->
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
   </style>