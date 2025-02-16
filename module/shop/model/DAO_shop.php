<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/SMARTTRADE_MVC/';
include($path . "/model/connect.php");

class DAOShop{
	function select_all_products($total_prod,$items_page){
		$sql = "SELECT * 
		FROM product p
		WHERE c.model = m.id_model  
		ORDER BY c.count DESC
		LIMIT $total_prod, $items_page";

		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql);
		connect::close($conexion);

		$retrArray = array();
		if (mysqli_num_rows($res) > 0) {
			while ($row = mysqli_fetch_assoc($res)) {
				$retrArray[] = $row;
			}
		}
		return $retrArray;
	}

	// function select_one_car($id){
	// 	$sql = "SELECT *
	// 	FROM car c, model m, type_motor t, category ca
	// 	WHERE c.id_car = '$id'
	// 	AND  c.model = m.id_model 
	// 	AND c.category = ca.id_cat
	// 	AND c.motor = t.cod_tmotor";

	// 	$conexion = connect::con();
	// 	$res = mysqli_query($conexion, $sql)->fetch_object();
	// 	connect::close($conexion);

	// 	return $res;
	// }

	// function select_imgs_car($id){
	// 	$sql = "SELECT i.id_car, i.img_cars
	// 		    FROM img_cars i
	// 		    WHERE i.id_car = '$id'";

	// 	$conexion = connect::con();
	// 	$res = mysqli_query($conexion, $sql);
	// 	connect::close($conexion);

	// 	$imgArray = array();
	// 	if (mysqli_num_rows($res) > 0) {
	// 		foreach ($res as $row) {
	// 			array_push($imgArray, $row);
	// 		}
	// 	}
	// 	return $imgArray;
	// }
}
