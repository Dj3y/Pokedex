<?php
$host = 'db';
$dbname = 'pokedex';
$username = 'root';
$password = "rootpassword";

try{
    $connect = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "You did it!";
} catch(PDOException $e){
    try {
        $host = '127.0.0.1';
        $connect = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn = $connect;
        //echo "You did it!";
    } catch (PDOException $e) {
        die("You failed! <br>" . $e->getMessage());
    }
}


?>