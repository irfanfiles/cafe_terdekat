<?php
require_once "conn.php";

$id_diet = $_POST["id_diet"];
$waktu = $_POST["waktu"];
$menu = $_POST["menu"];
$id_admin = $_POST["id_admin"];


switch ($waktu) {
	case "sarapan":
		$update = "UPDATE menu_diets SET sarapan = '$menu', id_admin = '$id_admin' WHERE id_diet = '$id_diet';";
	break;
	case "snack_time_siang":
		$update = "UPDATE menu_diets SET snack_time_siang = '$menu', id_admin = '$id_admin' WHERE id_diet = '$id_diet';";
	break;
	case "makan_siang":
		$update = "UPDATE menu_diets SET makan_siang = '$menu', id_admin = '$id_admin' WHERE id_diet = '$id_diet';";
	break;
	case "tea_time_sore":
		$update = "UPDATE menu_diets SET tea_time_sore = '$menu', id_admin = '$id_admin' WHERE id_diet = '$id_diet';";
	break;
	case "makan_malam":
		$update = "UPDATE menu_diets SET makan_malam = '$menu', id_admin = '$id_admin' WHERE id_diet = '$id_diet';";
	break;
	case "sebelum_tidur":
		$update = "UPDATE menu_diets SET sebelum_tidur = '$menu', id_admin = '$id_admin' WHERE id_diet = '$id_diet';";
	break;
	case "camilan":
		$update = "UPDATE menu_diets SET camilan = '$menu', id_admin = '$id_admin' WHERE id_diet = '$id_diet';";
	break;
	
	default:
	break;
}


// $update = "UPDATE menu_diets 
// SET 
// '$waktu' = 'menuuu'
// WHERE id_diet = '1';";

// $update = "UPDATE menu_diets 
// SET sarapan = 'srrrrrrrrrr', id_admin = '1' 
// WHERE id_diet = '1';";

if(mysqli_query($conn, $update))
{
	// $result["success"] = "1" . $id_diet . $waktu . $menu . $id_admin;
	$result["success"] = "1";
	echo json_encode($result);
	exit;
}else {	
	$result["success"] = "0";
	echo json_encode($result . mysqli_error($conn));
	exit;
}

// echo json_encode("id_Diet: " .$id_diet);
// echo json_encode("Waktu: " .$waktu);
// echo json_encode("Menu: " .$menu);
// echo json_encode("Id_admin: " .$id_admin);
?>