<?php
require_once "conn.php";

$id_cafe = $_POST["id_cafe"];
$nama_cafe = $_POST["nama_cafe"];
$alamat = $_POST["alamat"];
$jam_buka = $_POST["jam_buka"];
$jam_tutup = $_POST["jam_tutup"];
$lat = $_POST["lat"];
$lng = $_POST["lng"];
$foto = $_POST["foto"];
$ubah_foto = $_POST["ubah_foto"];

if (isset($_POST["foto"])) {
    $now = DateTime::createFromFormat('U.u', microtime(true));
    $photo_name = $now->format('YmdHisu') . "A.jpg";
    $upload_folder = "../uploaded";

    $path = "$upload_folder/$photo_name";

    if (file_put_contents($path, base64_decode($foto)) != false) {
        $input_oldfoto = "UPDATE cafes SET 
        nama_cafe = '$nama_cafe', 
        alamat = '$alamat', 
        lat = '$lat', 
        lng = '$lng', 
        jam_buka = '$jam_buka', 
        jam_tutup = '$jam_tutup', 
        foto = '$foto'
        WHERE id_cafe = '$id_cafe'
        ;";

        $input_newfoto = "UPDATE cafes SET 
        nama_cafe = '$nama_cafe', 
        alamat = '$alamat', 
        lat = '$lat', 
        lng = '$lng', 
        jam_buka = '$jam_buka', 
        jam_tutup = '$jam_tutup', 
        foto = '$photo_name'
        WHERE id_cafe = '$id_cafe'
        ;";

        if($ubah_foto == 1){
            if (mysqli_query($conn, $input_newfoto)) {
                $result["success"] = "1";
                echo json_encode($result);
                exit;
            } else {
                $result["success"] = "0";
                echo json_encode($result);
                exit;
            }
        } else {
            if (mysqli_query($conn, $input_oldfoto)) {
                $result["success"] = "1";
                echo json_encode($result);
                exit;
            } else {
                $result["success"] = "0";
                echo json_encode($result);
                exit;
            }
        }
        
    }
}
