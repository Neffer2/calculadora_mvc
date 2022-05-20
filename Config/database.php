<?php 
	class Conectar {
		public static function conection (){
			$conexion = new PDO("pgsql:host=ec2-54-204-56-171.compute-1.amazonaws.com;port=5432;dbname=dao79h7ujhca5l", "hajeywzaybxale", "ea352c20f81abd4606004dd94bc649626389b6d325d2732340ddfe59792deaf4");
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conexion;
		}
	}
?>