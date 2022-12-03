<?php
    session_start();
    require ("conexion_bd.php");

    $username = $_POST["user"];
    $password = $_POST["pass"];

    $query = "SELECT * FROM Users WHERE username = \"$username\" AND password = \"$password\"";
    $result = consultaBaseDatos($query);

    if (mysqli_num_rows($result) == 0) {
        echo "<script>
        alert('The user or password are incorrect');
        window.location.href='../front/index.html';
        </script>";
        } else {
        $_SESSION['user'] = $username;
        $_SESSION['pass'] = $password;
        //echo "entra";

        $time = time();
        $queryE = "INSERT INTO `Events`( `username`, `type_interaction`, `timestamp`) VALUES (\"$username\",0,now())";
        $result = consultaBaseDatos($queryE);
        
        header("Location:../front/html/principal.php");

    }

?>
