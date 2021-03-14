<?php
include("manejoBase.php");
$user = $_POST['username'];
$pass = $_POST['password'];
$sql = "select * from usuarios";
$result = db_query($sql);
$aux = true;
while ($row = mysqli_fetch_object($result)) {
    if ($row->username == $user && $row->password == $pass) {
        $aux = true;
        break;
    } else {
        $aux = false;
    }
}
if (!$aux) {
    echo "*El usuario o la contra son erroneos";
}
