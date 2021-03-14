<?php
include("manejoBase.php");
$tipo = $_POST['tipo'];
$id = $_POST['codigo'];
$stock = $_POST['stock'];
switch ($tipo) {
    case 1:
        selectUser("clientes", $id);
        break;

    case 2:
        selectProduct("productos", $id);
        break;
    case 3:
        actualizarStock("productos", $id, $stock);
        break;
}


function selectUser($tbl_name, $id)
{

    $sql = "select * from $tbl_name where idclientes = $id";
    $result = db_query($sql);
    $datos = mysqli_fetch_row($result);
    echo $datos[0] . ";" . $datos[1] . ";" . $datos[2] . ";" . $datos[3];
}

function selectProduct($tbl_name, $id)
{
    $sql = "select * from $tbl_name where idproductos = $id";
    $result = db_query($sql);
    $datos = mysqli_fetch_row($result);
    echo $datos[1] . ";" . $datos[2] . ";" . $datos[3];
}

function actualizarStock($tbl_name, $id, $stock)
{
    $sql = "update $tbl_name set stock = $stock where idproductos=$id";
    $result = db_query($sql);
}
