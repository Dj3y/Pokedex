<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pokedex</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <?php include_once("./header.php"); ?>

    <?php
    session_start();
    include("engine.php");

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
    ?>



    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usernameConnection = $_POST["username"];

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $usernameConnection);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($_POST["password"], $user['password'])) {
                $_SESSION['username'] = $user['username']; // Store the username in session
                $_SESSION['admin'] = $user['admin']; // Store the admin access in session

                header('Location: ../../index.php'); // Redirect to index.php
                exit;
            } else {
                echo "password not valid";
            }
        } else {
            echo "Connection is not good";
        }
    }

    ?>

    <?php include_once("./footer.php"); ?>
</body>

</html>