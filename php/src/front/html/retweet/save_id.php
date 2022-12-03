<?php
    session_start();

    $id = $_POST["tweet"];

    $_SESSION['last_id'] = $id;

    header("Location:../retweet.php");
?>