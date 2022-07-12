<?php

require "conn.php";

$username = $_GET["username"];
$password = $_GET["password"];

$sql = "SELECT * FROM users 
WHERE username = '$username' AND password = '$password'";

$result = mysqli_query($conn, $sql);

if (!mysqli_num_rows($result) > 0) //????????????
{
	$status = "failed";
	echo json_encode (array("response"=>$status));
}
else
{
	$row = mysqli_fetch_assoc($result);
	$id_user = $row['id_user'];
	$nama_user = $row['nama_user'];
	$username = $row['username'];
	$password = $row['password'];
	$foto = $row['foto'];
	$role = $row['role'];
	$status = 'ok';
	echo json_encode(array(
		"response"=>$status, 
		
		"id_user"=>$id_user, 
		"nama_user"=>$nama_user, 
		"username"=>$username,
		"password"=>$password,
		"foto"=>$foto,
		"role"=>$role
	));
}

mysqli_close($conn);

?>