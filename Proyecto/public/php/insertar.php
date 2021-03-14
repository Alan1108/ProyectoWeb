<?php
include('manejoBase.php');
$tipo = $_POST['tipo'];

if ($tipo == 1) {
    $field = array("nombre" => $_POST['nombre'], "precio" => $_POST['precio'], "stock" => $_POST['stock']);
    $tbl_name = "productos";
    echo $field;
    insert($tbl_name, $field);
} else if ($tipo == 2) {
    $field = array("nombre" => $_POST['nombre'], "cedula" => $_POST['cedula'], "direccion" => $_POST['direccion']);
    $tbl_name = "clientes";
    insert($tbl_name, $field);
} else if ($tipo == 3) {
    $field = array("username" => $_POST['username'], "password" => $_POST['contra']);
    $tbl_name = "usuarios";
    insert($tbl_name, $field);
}
