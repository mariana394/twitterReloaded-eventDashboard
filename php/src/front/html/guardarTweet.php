<?php
    require("../../conexion_bd.php");

    session_start();
    $username = $_SESSION['user'];

    $description = $_POST["tweet_desc"];

    $query = "INSERT INTO Tweets (description) VALUES (\"$description\")";
    $id = returnID($query);

    $query = "INSERT INTO Events (username, type_interaction, timestamp, id_tweet) VALUES(\"$username\", 1, now(), \"$id\")";
    $result = consultaBaseDatos($query);

    header("Location:./principal.php");
?>