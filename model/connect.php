<?php
	class connect{
		public static function con(){
			$host = 'localhost';  
    		$user = "root";                     
    		$pass = "";                             
    		$db = "smarttrade";                      
    		$port = 3306;                           
    		// $tabla="product";
    		
    		$conexion = mysqli_connect($host, $user, $pass, $db, $port)or die();
			return $conexion;
		}
		public static function close($conexion){
			mysqli_close($conexion);
		}
	}