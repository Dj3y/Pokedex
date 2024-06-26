<?php
     include("assets/php/engine.php");
    if(isset($_GET['idP'])){
        $idP = $_GET['idP'];
        $query = $connect->prepare ('SELECT * FROM `pokemon` 
                    WHERE id =?');
        $query->execute(array($idP));
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        // test pour voir si la requete fonctionne
        // echo '<pre>';
        // var_dump($array); //affiche toute la table pokemon
        // var_dump($array[0]["base"][2] . $array[0]["base"][3]); // affiche que l'info de l'index 0 colonne base et l'index 2 et 3 => HP
        // echo '</pre>';
       
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon Details</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include_once("assets/php/header.php"); ?>
    <main>
        <?php
        foreach($array as $pokemon){
            // Decode JSON fields
            $types = json_decode($pokemon["type"], true);
            echo '<pre>';
            print_r($types);
            echo '</pre>';
            // echo '<pre>';
            // print_r($types["type"][0]);
            // echo '</pre>';
            // echo count($types);
            $bases = json_decode($pokemon["base"], true);
            $evolutions = json_decode($pokemon["evolution"], true);
            echo '<div><section><h1>' . $pokemon["name"] . '</h1></section>';
            echo '<div>';

            // for pour afficher les types du pokemon ajout de type => le tableau 
            for($i = 0; $i < count($types["type"]); $i++){
                echo'<div><p>'. $types["type"][$i] . '</p></div>'; 
            }
            
            // foreach pour afficher les bases
            foreach($bases as $base => $key){
                echo'<div><p>' . $base . ' '. $key . '</p></div>';
            }

            // foreach pour afficher les evolutions
            foreach($evolutions as $evolution => $key){
                echo'<div><p>' . $evolution . ' '. $key . '</p></div>';
            }
            echo '</div>';
            echo '<div><img src="assets/pokemon/' .$pokemon["image"] . '" alt="image of ' .$pokemon["name"] . '"><div>';
        }
        include("assets/php/button.php");
        ?>

    </main>
    <?php include_once("assets/php/footer.php"); ?>
    
</body>
</html>