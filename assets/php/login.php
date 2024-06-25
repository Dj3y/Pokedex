<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pokedex</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php include_once("./header.php"); ?>

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
    <section class="form-login">
        <h1>My account</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <label>Username: </label><input type="text" name="username" class="inputfield"><br>
            <label>Password: </label><input type="password" name="password" class="inputfield"><br>
            <input type="submit" value="login" class="button"><br>
            <p><a href="./register.php">inscription</a></p>
        </form>
    </section>
    <?php

        echo "</main>";
    } catch (PDOException $e) {
        echo "Connection failed";
    }
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