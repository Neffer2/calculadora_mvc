<?php 
	class Conectar {
		public static function conection (){
			$conexion = new PDO("mysql:host=localhost;dbname=mvc_cel", "root", "");
			return $conexion;
		}
	}
?>