<?php

$path = $_SERVER['DOCUMENT_ROOT'] . '/MQC_MVC_EXAMEN_joanjimenez_si/';
include($path . "model/connect.php");
// include("model/connect.php");

class DAOhouseholds
{
	function insert_households($datos)
	{
		$id = isset($datos['id']) ? $datos['id'] : null; // Ajuste para evitar error de índice no definido
		$ref_id = $datos['ref_id'];
		$h_type = $datos['h_type'];
		$price = $datos['price'];
		$m2 = $datos['m2'];
		$garage = $datos['garage'];
		$rooms = $datos['rooms'];
		$heating = $datos['heating'];
		$location = $datos['location'];
		$publication_date = $datos['publication_date'];
		foreach ($datos['heating'] as $indice) {
			$heating = $heating."$indice:";
		}  

		$sql = "INSERT INTO households (id, ref_id, h_type, price, m2, garage, rooms, heating, location, publication_date)"
			. "VALUES ('$id', '$ref_id', '$h_type', '$price', '$m2', '$garage', '$rooms', '$heating', '$location', '$publication_date')";

		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql);
		connect::close($conexion);
		return $res;
	}

	function select_all_households()
	{
		// $data = 'hola DAO select_all_households';
		// die('<script>console.log('.json_encode( $data ) .');</script>');
		$sql = "SELECT * FROM households ORDER BY id ASC";

		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql);
		connect::close($conexion);
		return $res;
	}

	function select_households($ref_id)
	{
		// $data = 'hola DAO select_households';
		// die('<script>console.log('.json_encode( $data ) .');</script>');
		$sql = "SELECT * FROM households WHERE ref_id='$ref_id'";

		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql)->fetch_object();
		connect::close($conexion);
		return $res;
	}

	function update_households($datos)
	{
		//die('<script>console.log('.json_encode( $datos ) .');</script>');
		$ref_id = $datos['ref_id'];
		$h_type = $datos['h_type'];
		$price = $datos['price'];
		$m2 = $datos['m2'];
		$garage = $datos['garage'];
		$rooms = $datos['rooms'];
		$heating = $datos['heating'];
		$location = $datos['location'];
		$publication_date = $datos['publication_date'];
		foreach ($datos['heating'] as $indice) {
			$heating = $heating."$indice:";
		}  
		
		//foreach ($datos['idioma'] as $indice) {
		// $language=$language."$indice:";
		//	}
		//$comment=$datos['observaciones'];
		//foreach ($datos['aficion'] as $indice) {
		//	    $hobby=$hobby."$indice:";
		//	}

		$sql = " UPDATE households SET ref_id='$ref_id', h_type='$h_type', price='$price', m2='$m2', garage='$garage', rooms='$rooms', heating='$heating', location='$location', publication_date='$publication_date'"
			. "   WHERE ref_id='$ref_id'";

		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql);
		connect::close($conexion);
		return $res;
	}

	function delete_households($ref_id)
	{
		$sql = "DELETE FROM households WHERE ref_id='$ref_id'";

		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql);
		connect::close($conexion);
		return $res;
	}

	function delete_all_households()
	{
		$sql = "DELETE FROM households";

		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql);
		connect::close($conexion);

		return $res;
	}

	function dummies_households()
	{
		$sql = "DELETE FROM households;";

		$sql .= "INSERT INTO households (ref_id, h_type, price, m2, garage, rooms, heating, location, publication_date)"
			. " VALUES ('123ABC', 'flat', 200000, 150, 'true', 10, 'electric', 'Madrid', '01/10/2023');";

		$sql .= "INSERT INTO households (ref_id, h_type, price, m2, garage, rooms, heating, location, publication_date)"
			. " VALUES ('456DEF', 'house', 800000, 550, 'true', 15, 'natural_gas', 'Barcelona', '02/10/2023');";

		$sql .= "INSERT INTO households (ref_id, h_type, price, m2, garage, rooms, heating, location, publication_date)"
			. " VALUES ('789GHI', 'country_house', 30000, 300, 'true', 6, 'gas', 'Valencia', '03/10/2023');";

		$sql .= "INSERT INTO households (ref_id, h_type, price, m2, garage, rooms, heating, location, publication_date)"
			. " VALUES ('321JKL', 'office', 60000, 200, 'false', 10, 'electric', 'Sevilla', '04/10/2023');";

		$sql .= "INSERT INTO households (ref_id, h_type, price, m2, garage, rooms, heating, location, publication_date)"
			. " VALUES ('654MNO', 'warehouse', 10000, 25, 'false', 3, 'none', 'Alicante', '05/10/2023');";

		$conexion = connect::con();
		$res = mysqli_multi_query($conexion, $sql);
		connect::close($conexion);

		return $res;
	}
}
