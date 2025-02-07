<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/SMARTTRADE_MVC/';
include($path . "model/connect.php");

class DAOCourse
{
	function insert_course($datos)
	{
		// die('<script>console.log('.json_encode( $datos ) .');</script>');

		$id_course = $datos['id_course'];
		$name_course = $datos['name_course'];
		$description_course = $datos['description_course'];
		$category_course = "";
		if (isset($datos['category_course']) && is_array($datos['category_course'])) {
			$category_course = implode(":", $datos['category_course']);
		}
		$level_course = "";
		if (isset($datos['level_course']) && is_array($datos['level_course'])) {
			$level_course = implode(":", $datos['level_course']);
		}
		$price_course = $datos['price_course'];
		// Asegúrate de que 'language_course' se está recibiendo
		$language_course = isset($_POST['language_course']) ? $_POST['language_course'] : '';

		$datestart_course = $datos['datestart_course'];
		$dateend_course = $datos['dateend_course'];


		$sql = "INSERT INTO courses (id_course, name_course, description_course, category_course, level_course, price_course, language_course, datestart_course, dateend_course)"
			. "VALUES ('$id_course', '$name_course', '$description_course', '$category_course', '$level_course', '$price_course', '$language_course', '$datestart_course', '$dateend_course')";


		// die('<script>console.log('.json_encode( $sql ) .');</script>');
		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql);
		connect::close($conexion);
		return $res;
	}

	function select_all_courses()
	{
		// $data = 'hola DAO select_all_courses';
		// die('<script>console.log('.json_encode( $data ) .');</script>');
		$sql = "SELECT * FROM courses ORDER BY id ASC";

		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql);
		connect::close($conexion);
		return $res;
	}

	function select_course($id_course)
	{
		// $data = 'hola DAO select_user';
		// die('<script>console.log('.json_encode( $data ) .');</script>');
		$sql = "SELECT * FROM courses WHERE id_course='$id_course'";

		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql)->fetch_object();
		connect::close($conexion);
		return $res;
	}

	function update_course($datos)
	{
		//die('<script>console.log('.json_encode( $datos ) .');</script>');
		$id_course = $datos['id_course'];
		$name_course = $datos['name_course'];
		$description_course = $datos['description_course'];
		$category_course = "";
		if (isset($datos['category_course']) && is_array($datos['category_course'])) {
			$category_course = implode(":", $datos['category_course']);
		}
		$level_course = "";
		if (isset($datos['level_course']) && is_array($datos['level_course'])) {
			$level_course = implode(":", $datos['level_course']);
		}
		$price_course = $datos['price_course'];
		// Asegúrate de que 'language_course' se está recibiendo
		$language_course = isset($_POST['language_course']) ? $_POST['language_course'] : '';

		$datestart_course = $datos['datestart_course'];
		$dateend_course = $datos['dateend_course'];

		$sql = " UPDATE courses SET name_course='$name_course', description_course='$description_course', category_course='$category_course', level_course='$level_course', price_course='$price_course', "
			. " language_course='$language_course', datestart_course='$datestart_course', dateend_course='$dateend_course' WHERE id_course='$id_course'";

		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql);
		connect::close($conexion);
		return $res;
	}

	function delete_course($id_course)
	{
		$sql = "DELETE FROM courses WHERE id_course='$id_course'";

		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql);
		connect::close($conexion);
		return $res;
	}

	function delete_all_courses(){
		$sql = "DELETE FROM courses";
		
		$conexion = connect::con();
		$res = mysqli_query($conexion, $sql);
		connect::close($conexion);

		return $res;
	}

	function dummies_courses() {
		$sql = "DELETE FROM courses;";
	
		$sql .= "INSERT INTO courses (id_course, name_course, description_course, category_course, level_course, price_course, language_course, datestart_course, dateend_course)"
		. " VALUES (101, 'JavaBasics', 'Introduction to Java programming', 'Java', 'Rookie', 50, 'English', '01-02-2025', '01-03-2025');";
	
		$sql .= "INSERT INTO courses (id_course, name_course, description_course, category_course, level_course, price_course, language_course, datestart_course, dateend_course)"
		. " VALUES (202, 'HtmlForBeginners', 'Basic HTML concepts and structure', 'HTML', 'Beginner', 30, 'Spanish', '10-02-2025', '10-03-2025');";
	
		$sql .= "INSERT INTO courses (id_course, name_course, description_course, category_course, level_course, price_course, language_course, datestart_course, dateend_course)"
		. " VALUES (303, 'CssStyling', 'Master CSS styles for modern web design', 'CSS', 'Intermediate', 40, 'English', '15-02-2025', '15-04-2025');";
	
		$sql .= "INSERT INTO courses (id_course, name_course, description_course, category_course, level_course, price_course, language_course, datestart_course, dateend_course)"
		. " VALUES (404, 'AdvancedJava', 'Deep dive into advanced Java topics', 'Java', 'Advanced', 70, 'Spanish', '01-03-2025', '01-06-2025');";
	
		$sql .= "INSERT INTO courses (id_course, name_course, description_course, category_course, level_course, price_course, language_course, datestart_course, dateend_course)"
		. " VALUES (505, 'HtmlCssFusion', 'Integrating HTML and CSS for professional designs', 'HTML', 'Intermediate', 60, 'English', '20-02-2025', '20-05-2025');";
	
		$conexion = connect::con();
		$res = mysqli_multi_query($conexion, $sql);
		connect::close($conexion);
	
		return $res;
	}
	
}
