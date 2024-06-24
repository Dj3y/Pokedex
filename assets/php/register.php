<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pokedex</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <?php
    session_start();

    $servername = "127.0.0.1";
    $username = "root";
    $dbname = "pokedex";



    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // exception error


        echo "<main class='formCase'>";
    ?>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <label>Username: </label><input type="text" name="username" class="inputfield"><br>
            <label>Password: </label><input type="password" name="password" class="inputfield"><br>
            <label>Repeat: </label><input type="password" name="repassword" class="inputfield"><br>
            <label>Email: </label><input type="text" name="email" class="inputfield"><br>
            <input type="submit" value="inscription" class="button"><br>
            <p><a href="./login.php">login</a></p>
        </form>

    <?php
        echo "</main>";
    } catch (PDOException $e) {
        echo "Connection failed";
    }
    ?>






    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Use prepared statements to avoid SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $_POST["username"]);
        $stmt->execute();

        // Check if a user was found
        if ($stmt->rowCount() > 0) {
            echo "Username already exists";
        } else {
            $stmt = $conn->prepare("INSERT INTO users (username, password, email, admin, favoris) VALUES (:username, :password, :email, :admin, :favoris)");
            $stmt->bindParam(':username', $_POST["username"]);
            $stmt->bindParam(':password', $_POST["password"]);
            $stmt->bindParam(':email', $_POST["email"]);
            $stmt->bindParam(':admin', $admin);
            $stmt->bindParam(':favoris', $fav);

            $admin = 0;
            $fav = '{"fav":[]}';


            $stmt->execute();

            header('Location: login.php'); // Redirect to login.php
            exit;
        }
    }

    ?>

    <?php include_once("./footer.php"); ?>
</body>

</html>