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
                
                
                $nbr = 20;
                if(!empty($_GET['page'])){
                $page = $_GET['page'];
                }else{
                    $page = 1;
                }

                for($i = 0; $i < $nbr; $i ++){
                    $value = $results[$i + (20 * ($page - 1))];
                    echo '<div class="pokemon-card"><a href="pokemonDetails.php?idP='. $value["id"] .'">';
                    echo '<h2>' . $value["name"] . '</h2>';
                    echo '<img src="assets/pokemon/' . $value["image"] . '" alt="' . $value["name"] . '">';
                    echo '</a></div>';
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

?>