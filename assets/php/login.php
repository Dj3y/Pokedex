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
            <input type="submit" value="login" class="button"><br>
            <p><a href="./register.php">inscription</a></p>
        </form>

    <?php

        echo "</main>";
    } catch (PDOException $e) {
        echo "Connection failed";
    }
    ?>



    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usernameConnection = $_POST["username"];
        $passwordConnection = $_POST["password"];

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $stmt->bindParam(':username', $usernameConnection);
        $stmt->bindParam(':password', $passwordConnection);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['username'] = $user['username']; // Store the username in session
            $_SESSION['admin'] = $user['admin']; // Store the admin access in session

            header('Location: ../../index.php'); // Redirect to index.php
            exit;
        } else {
            echo "Connection is not good";
        }
    }

    ?>

    <?php include_once("./footer.php"); ?>
</body>

</html>