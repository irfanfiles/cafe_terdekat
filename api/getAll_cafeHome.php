<?php
require_once 'conn.php';


$query = "SELECT C.id_cafe, C.nama_cafe, C.alamat, C.lat, C.lng, C.jam_buka, C.jam_tutup, C.foto, R.id_rating, R.rating, W.id_review, W.review 
FROM cafes C 
LEFT JOIN ratings R ON R.id_cafe = C.id_cafe 
LEFT JOIN reviews W ON W.id_cafe = C.id_cafe
WHERE C.aktif = '1' 
GROUP BY C.id_cafe;";

$result = mysqli_query($conn, $query);
$response = array();
while ($row = mysqli_fetch_assoc($result)){
	array_push($response,
		array(
			'id_cafe' => $row['id_cafe'],
			'nama_cafe' => $row['nama_cafe'],
			'alamat' => $row['alamat'],
			'lat' => $row['lat'],
			'lng' => $row['lng'],
			'jam_buka' => $row['jam_buka'],
			'jam_tutup' => $row['jam_tutup'],
			'foto' => $row['foto'],
			'rating' => $row['rating'],
			'review' => $row['review']
		)
	);
}
echo json_encode($response);
mysqli_close($conn);
?>