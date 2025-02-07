<?php
	class connect{
		public static function con(){
			$host = 'localhost';  
    		$course = "root";                     
    		$pass = "";                             
    		$db = "udemy";                      
    		$port = 3306;                           
    		$tabla="courses";
    		
    		$conexion = mysqli_connect($host, $course, $pass, $db, $port)or die();
			return $conexion;
		}
		public static function close($conexion){
			mysqli_close($conexion);
		}
	}