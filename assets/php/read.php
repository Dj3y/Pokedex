<?php 
    // connexion DB pour docker
    // include("assets/php/engine.php");
    // connexion DB pour XAMPP - MAMP - LAMP
    include("assets/php/dbconnect.php");
try {
    $sql = "SELECT * FROM pokemon";

    $select = $connect->prepare($sql);
    //u not searching a precise thing, since * then no need ([])!
    $select->execute(); 
    $results = $select->fetchAll(PDO::FETCH_ASSOC);
    foreach($results as $value){
        echo '<div class="pokemon-card">';
        echo '<img src="Assets/pokemon' . $value["image"] . '" alt="' . $value["name"] . '">';
        echo '<h2>' . $value["name"] . '</h2>';
        echo '<p>Type: ' . $value["type"] . '</p>';
        echo '<p>Base: ' . $value["base"] . '</p>';
        echo '<p>Evolution: ' . $value["evolution"] . '</p>';
        echo '</div>';
    }
} catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
}   

?>

