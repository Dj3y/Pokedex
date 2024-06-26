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
    <?php include_once("./assets/php/header.php"); ?>

    <?php

    include("./assets/php/engine.php");

    echo "<main class='formCase'>";
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <label>Username: </label><input type="text" name="username" class="inputfield"><br>
        <label>Password: </label><input type="password" name="password" class="inputfield" id="password"><br>
        <label>Repeat: </label><input type="password" name="repassword" class="inputfield" id="repassword"><br>
        <label id="error-repassword"></label><br>
        <label>Email: </label><input type="text" name="email" class="inputfield"><br>
        <input type="submit" value="inscription" class="button"><br>
        <p><a href="./login.php">login</a></p>
    </form>

    <script>
        $("#repassword").on('input', function(e) {
            console.log($("#repassword").val())
            if ($("#repassword").val() != $("#password").val()) {
                $("#error-repassword").text("password does not match")
            } else {
                $("#error-repassword").text("")
            }
        })

        $(".button").on('mouseenter touchstart', function(e) {
            e.target.type = "button"
            if ($("#password").val().length > 3 && $("input[name=username]").val().length > 3) {
                if ($("#repassword").val() == $("#password").val()) {
                    e.target.type = "submit"
                }
            }
        })
    </script>

    <?php
    echo "</main>";
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
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':admin', $admin);
            $stmt->bindParam(':favoris', $fav);

            $admin = 0;
            $fav = '{"fav":[]}';

            $username = htmlspecialchars(trim(filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS)));
            $password = htmlspecialchars(trim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS)));
            $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            if (strlen($username) > 3 && strlen($password) > 3) {
                $stmt->execute();
                header('Location: ./login.php'); // Redirect to login.php
                exit;
            } else {
                echo "form not valid";
            }
        }
    }

    ?>

    <?php include_once("./assets/php/footer.php"); ?>
</body>

</html>