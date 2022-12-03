<?php
    require("../../conexion_bd.php");

    $event_id = $_SESSION['last_id'];

    $query = "SELECT t.description
    FROM Events e, Tweets t
    WHERE e.id_event = \"$event_id\"
    AND e.id_tweet = t.id_tweet";

    $result = consultaBaseDatos($query);

    while($row = mysqli_fetch_array($result)) {
        echo '<label class="col-md-12">'.$row['description'].'</label>';
    }
?>