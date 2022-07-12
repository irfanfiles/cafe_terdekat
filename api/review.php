<?php

require "conn.php";

$id_cafe = $_POST["id_cafe"];
$review = $_POST["review"];
$id_user = $_POST["id_user"];
$rating = $_POST["rating"];


$sql = "INSERT INTO reviews (review, id_cafe, id_user) 
VALUES ('$review', '$id_cafe', '$id_user');";

if (mysqli_query($conn, $sql))
{
	$sql2 = "INSERT INTO ratings (rating, id_cafe, id_user) 
	VALUES ('$rating', '$id_cafe', '$id_user');";
	if(mysqli_query($conn, $sql2))
	{
		$status = "ok";
	}
	else
	{
		$status = "error_rating";
	}
}
else
{
	$status = "error_review";
}

echo json_encode(array("response"=>$status));

mysqli_close($conn);

?>