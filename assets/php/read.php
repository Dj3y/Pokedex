<?php 
include("./engine.php");
try {
    $sql = "SELECT * FROM pokemon LIMIT 10";

    $select = $connect->prepare($sql);
    //u not searching a precise thing, since * then no need ([])!
    $select->execute(); 
    $results = $select->fetchAll(PDO::FETCH_ASSOC);
    foreach($results as $value){
        echo '<div class="pokemon-card">';
        echo '<img src="' . $value["image"] . '" alt="' . $value["name"] . '">';
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
    <form action="search.php" method="post">
    <label for="name">Pokémon Name:</label>
        <input type="text" name="name" id="id" required>
        <button name="search">Search</button>
    </form>

