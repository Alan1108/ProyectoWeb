<?php
function db_query($query)
{
    $connection = mysqli_connect("localhost", "root", "12345678", "proyectousuarios");
    $result = mysqli_query($connection, $query);
    return $result;
}
function insert($tblname, $form_data)
{
    $fields = array_keys($form_data);
    $sql = "INSERT INTO " . $tblname . "(" . implode(',', $fields) . ")  VALUES('" . implode("','", $form_data) . "')";
    return db_query($sql);
}

function habilitar($tblname, $field_id, $id)
{
    $estado1 = "select estado from $tblname where $field_id = $id";
    $result = mysqli_fetch_array(db_query($estado1));
    if ($result[0] == 1) $estado = 0;
    else $estado = 1;
    $sql = "update " . $tblname . " set estado = $estado where " . $field_id . "=" . $id;
    return db_query($sql);
}

function edit($tblname, $form_data, $field_id, $id)
{
    $sql = "UPDATE " . $tblname . " SET ";
    $data = array();

    foreach ($form_data as $column => $value) {

        $data[] = $column . "=" . "'" . $value . "'";
    }
    $sql .= implode(',', $data);
    $sql .= " where " . $field_id . " = " . $id . "";
    return db_query($sql);
}
function select_id($tblname, $field_name, $field_id)
{
    $sql = "Select * from " . $tblname . " where " . $field_name . " = " . $field_id . "";
    $db = db_query($sql);
    $GLOBALS['row'] = mysqli_fetch_object($db);

    return $sql;
}
