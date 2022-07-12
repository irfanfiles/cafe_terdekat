<?php
require_once 'conn.php';

$id_cafe = $_GET['id_cafe'];

$query = "SELECT * FROM reviews 
JOIN users ON users.id_user = reviews.id_user
WHERE id_cafe = '$id_cafe'";

$result = mysqli_query($conn, $query);
$response = array();
while ($row = mysqli_fetch_assoc($result)){
	array_push($response,
		array(
			'nama_user' => $row['nama_user'],
			'review' => $row['review']
		)
	);
}
echo json_encode($response);
mysqli_close($conn);
?>