<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
    Sélectionnez le fichier JSON à télécharger :
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Télécharger le fichier" name="submit">
</form>

<?php
if (isset($_POST["submit"])) {
    $servername = "127.0.0.1";
    $username = "root";
    $dbname = "pokedex";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // exception error

        $stmt = $conn->prepare("INSERT INTO pokemon (id, name, type, base, evolution, image) VALUES (:id, :name, :type, :base, :evolution, :image)");
        $stmt->bindParam(':id', $pokemon_id);
        $stmt->bindParam(':name', $pokemon_name);
        $stmt->bindParam(':type', $pokemon_type);
        $stmt->bindParam(':base', $pokemon_base);
        $stmt->bindParam(':evolution', $pokemon_evolution);
        $stmt->bindParam(':image', $pokemon_image);




        $jsondata = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
        $data = json_decode($jsondata, true);


        foreach ($data as $row) {
            $pokemon_id = $row["id"];
            $pokemon_name = $row["name"]["french"];
            $pokemon_type = '{ "type":' . json_encode($row["type"]) . "}";
            $pokemon_base = isset($row["base"]) ? json_encode($row["base"]) : "{}";
            $pokemon_evolution = "{}";
            $pokemon_image = $row["name"]["english"] . ".png";

            $stmt->execute();

            echo  "add: " . $pokemon_id . " -> " . $pokemon_name . " -> " . $pokemon_type . " -> " . $pokemon_base . " -> " . $pokemon_image;
            echo "<br>";
        }


        $conn = null;
    } catch (PDOException $e) {
        echo "Connection failed";
    }
}
?>