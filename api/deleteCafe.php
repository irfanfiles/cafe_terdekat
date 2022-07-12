<?php
require_once "conn.php";

$id_cafe = $_POST["id_cafe"];

$delete = "UPDATE cafes SET aktif = '0'
WHERE id_cafe = '$id_cafe'";

if (mysqli_query($conn, $delete)) {
    $result["success"] = "1";
    echo json_encode($result);
    exit;
} else {
    $result["success"] = "0";
    echo json_encode($result);
    exit;
}
