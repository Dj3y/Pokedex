<?php 
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
                $name = $_POST['name'];
                $sql = "SELECT * FROM pokemon WHERE name = :name  ORDER BY name ASC";
                $params = [':name' => $name];
            } else {
                $sql = "SELECT * FROM pokemon  ORDER BY name ASC";
                $params = [];
            }

            try {
                $select = $connect->prepare($sql);
                $select->execute($params); 
                $results = $select->fetchAll(PDO::FETCH_ASSOC);
                
                foreach ($results as $value) {
                    echo '<div class="pokemon-card">';
                    echo '<h2>' . $value["name"] . '</h2>';
                    echo '<img src="assets/pokemon/' . $value["image"] . '" alt="' . $value["name"] . '">';
                    echo '</div>';
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

?>