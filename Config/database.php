<?php 
	class Conectar {
		// public static function conection (){
		// 	$conexion = new PDO("mysql:host=localhost;dbname=prueba_php", "root", "");
		// 	return $conexion;
		// }

		public static function conection (){
			$conexion = new PDO("mysql:host=ec2-54-204-56-171.compute-1.amazonaws.com;dbname=dao79h7ujhca5l", "hajeywzaybxale", "ea352c20f81abd4606004dd94bc649626389b6d325d2732340ddfe59792deaf4");
			return $conexion;
		}
	}
?>