<?php

require ('../../conexion_bd.php');

$username = $_SESSION['user'];

$query = "select *
FROM Users u
WHERE u.username = \"$username\"";

$result = consultaBaseDatos($query);

while($row = mysqli_fetch_array($result)) {
    echo '                                    <div class="form-group">
    <label class="col-md-12">Full Name: '.$row['name'].'</label>
</div>
<div class="form-group">
    <label for="example-email" class="col-md-12">Email: '.$row['username'].'</label>
</div>
</div>';
}
?>