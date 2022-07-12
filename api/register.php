<?php

require "conn.php";

$nama_user = $_POST["nama_user"];
$username = $_POST["username"];
$password = $_POST["password"];
$ar_foto = array("gb4.jpg", "gb5.jpg", "gb10.jpg");
$role = "user";
$selected_foto = $ar_foto[array_rand($ar_foto, 1)];

$sql = "SELECT * FROM users WHERE username = '$username'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{
	$status = "exist";
}
else
{
	$sql = "INSERT INTO users (nama_user, username, password, foto, role) 
    VALUES ('$nama_user', '$username', '$password', '$selected_foto', '$role');";
	
	if(mysqli_query($conn, $sql))
	{
		$status = "ok";
	}
	else
	{
		$status = "error";
		
	}
}

echo json_encode(array("response"=>$status));

mysqli_close($conn);

?>