<?php 
    // connexion DB pour docker
    // include("assets/php/engine.php");
    // connexion DB pour XAMPP - MAMP - LAMP
    include("assets/php/dbconnect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
    $name = $_POST['name'];

    try {
        $sql = "SELECT * FROM pokemon WHERE name = :name ORDER BY name ASC";
        $params = [':name' => $name];

        $select = $connect->prepare($sql);
        $select->execute($params); 
        $results = $select->fetchAll(PDO::FETCH_ASSOC);
        
        if (empty($results)) {
            echo '<p>No Pokémon found with that name.</p>';
        } else {
            foreach ($results as $value) {
                echo '<div class="pokemon-card">';
    
                // Decode JSON fields
                $types = json_decode($value["type"], true);
                $base = json_decode($value["base"], true);
                $evolution = json_decode($value["evolution"], true);
                
                echo '<p>Pokémon infos:</p>';
                // Display types
                if (isset($types['type'])) {
                    echo '<p>Type: ' . implode(", ", $types['type']) . '</p>';
                } else {
                    echo '<p>Type: Unknown</p>';
                }
                
                // Display infos
                foreach ($base as $stat => $statValue) {
                    echo '<p>' . $stat . ': ' . $statValue . '</p>';
                }
                
                // Display evolution (if any)
                if (!empty($evolution)) {
                    echo '<p>Evolution: ' . implode(", ", $evolution) . '</p>';
                } else {
                    echo '<p>Evolution: None</p>';
                }
                
                echo '</div>';
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
