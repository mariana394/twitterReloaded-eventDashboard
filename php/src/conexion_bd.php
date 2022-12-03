<?php
function consultaBaseDatos($consulta){
    $conexion = mysqli_connect("db", "root", "root", "Twitter_Db");
    $resultado = mysqli_query($conexion, $consulta);
    if($resultado){
        return $resultado;
    }else{
        return FALSE;
    }
    mysqli_close($conexion);
}

function returnID($consulta){
    $conexion = mysqli_connect("db", "root", "root", "Twitter_Db");
    $resultado = mysqli_query($conexion, $consulta);
    if($resultado){
        $query = "SELECT LAST_INSERT_ID()";
        $result = mysqli_query($conexion,$query);
        while($row = mysqli_fetch_array($result)) {
            $id = $row['LAST_INSERT_ID()'];       // Print the entire row data
        }
        return $id;
    }else{
        return FALSE;
    }
    mysqli_close($conexion);
}
?>