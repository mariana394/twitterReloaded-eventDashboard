<?php

require ("./conexion_bd.php");

session_start();
$username = $_SESSION['user'];

$query = "select *
FROM Users u
WHERE u.username = \"$username\"";

$result = consultaBaseDatos($query);

while($row = mysqli_fetch_array($result)) {
    echo '<label class="col-md-12">Full Name</label>
    <div class="col-md-12">
        <input type="text" placeholder="Johnathan Doe"
            class="form-control form-control-line">
    </div>
</div>
<div class="form-group">
    <label for="example-email" class="col-md-12">Email</label>
    <div class="col-md-12">
        <input type="email" placeholder="johnathan@admin.com"
            class="form-control form-control-line" name="example-email"
            id="example-email">
    </div>
</div>
<div class="form-group">
    <label class="col-md-12">Password</label>
    <div class="col-md-12">
        <input type="password" value="password"
            class="form-control form-control-line">
    </div>
</div>';
}
?>