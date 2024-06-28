<?php
     include("assets/php/engine.php");

     if(isset($_GET['idP'])){
        $idPokemon = $_GET['idP'];
        $query = $connect->prepare ('SELECT * FROM `pokemon` 
                    WHERE `image` =?');
        $query->execute(array($idPokemon));
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
     //    $idPokemon = $array[0]['id'];
        $idP = $array[0]['id'];
        echo $idP;
        // test pour voir si la requete fonctionne
        echo '<pre>';
        var_dump($array); //affiche toute la table pokemon
        // var_dump($array[0]["base"][2] . $array[0]["base"][3]); // affiche que l'info de l'index 0 colonne base et l'index 2 et 3 => HP
        echo '</pre>';
         //redirection vers la page index.php
       header("Location:pokemonDetails.php?idP=$idP");
    }
?>