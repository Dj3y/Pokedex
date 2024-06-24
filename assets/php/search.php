<?php
include("engine.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
    $name = $_POST['name'];

    try {
        $sql = "SELECT * FROM pokemon WHERE name = :name";
        $select = $connect->prepare($sql);
        $select->execute([':name' => $name]);
        $results = $select->fetchAll(PDO::FETCH_ASSOC);

        if (count($results) > 0) {
            foreach ($results as $value) {
                echo '<div class="pokemon-card">';
                echo '<h2>' . $value["name"] . '</h2>';
                echo '<p>Type: ' . $value["type"] . '</p>';
                echo '<p>Base: ' . $value["base"] . '</p>';
                echo '<p>Evolution: ' . $value["evolution"] . '</p>';
                echo '<img src="' . $value["image"] . '" alt="' . $value["name"] . '">';
                echo '</div>';
            }
        } else {
            echo '<p>No Pokémon found with that name.</p>';
        }
    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
    }
}
?>
