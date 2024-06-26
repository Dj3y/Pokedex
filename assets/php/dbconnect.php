<?php
    $host = 'localhost';
    $dbname = 'pokedex';
    $username = 'root';
    $password = '';

    try {
        // On se connecte à MySQL
	    $connect = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    // affichage des erreurs
    catch(PDOException $e) {
        $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
        die($msg);
    }

?>