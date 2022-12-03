<?php
    require("../../../conexion_bd.php");

    session_start();
    $username = $_SESSION['user'];
    $event_id = $_SESSION['last_id'];

    $query = "SELECT id_tweet
    FROM Events
    WHERE id_event = \"$event_id\"";

    $result = consultaBaseDatos($query);

    while($row = mysqli_fetch_array($result)) {
        $id_tweet = $row['id_tweet'];
    }

    $description = $_POST["reply_desc"];

    $query = "INSERT INTO Replies (description) VALUES (\"$description\")";
    $id = returnID($query);

    $query = "INSERT INTO Events (username, type_interaction, timestamp, id_tweet, id_reply) VALUES(\"$username\", 2, now(), \"$id_tweet\", \"$id\")";
    $result = consultaBaseDatos($query);

    header("Location:../principal.php");
?>