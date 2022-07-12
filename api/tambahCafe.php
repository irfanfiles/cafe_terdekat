<?php 
require_once "conn.php";

$nama_cafe = $_POST["nama_cafe"];
$alamat = $_POST["alamat"];
$jam_buka = $_POST["jam_buka"];
$jam_tutup = $_POST["jam_tutup"];
$lat = $_POST["lat"];
$lng = $_POST["lng"];
$foto = $_POST["foto"];


if(isset($_POST["foto"])){
    $now = DateTime::createFromFormat('U.u', microtime(true));
    $photo_name = $now->format('YmdHisu')."A.jpg";
    $upload_folder = "../uploaded";

    $path = "$upload_folder/$photo_name";

    if(file_put_contents($path, base64_decode($foto)) != false){
        $input = "INSERT INTO cafes (nama_cafe, alamat, lat, lng, jam_buka, jam_tutup, foto, aktif)
        VALUES ('$nama_cafe', '$alamat', '$lat', '$lng', '$jam_buka', '$jam_tutup', '$photo_name', '1');";
        
        if (mysqli_query($conn, $input)){
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
