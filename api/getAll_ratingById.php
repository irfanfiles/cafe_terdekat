<?php
require_once 'conn.php';

$id_cafe = $_GET['id_cafe'];
$total = 0;

$query = "SELECT * FROM ratings 
WHERE id_cafe = '$id_cafe'";

$result = mysqli_query($conn, $query);
$response = array();
while ($row = mysqli_fetch_assoc($result)){
	array_push($response,
		array(
			'rating' => $row['rating']
		)
	);

	$total = $total + $row['rating'];
}
echo json_encode($response);
mysqli_close($conn);
?>