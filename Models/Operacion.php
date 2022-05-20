<?php 
	class Operacion {
		private $db;
		private $operaciones;
 
		public function __construct (){
			$this->db = Conectar::conection();
			$this->operaciones = array();
		}

		public function save ($num1, $num2, $operacion, $resulado){
			try {
				$sql = "INSERT INTO Operaciones (numero_1, numero_2, operacion, resultado) VALUES ('$num1', '$num2', '$operacion', '$resulado')";
				$resulado = $this->db->query($sql);

				return array("succsess" => "Registro guardado existosamente");
			}catch(PDOException $e) {
	  			return array("Error" => $e->getMessage());
			}
		}

		public function All(){
			$sql = "SELECT * FROM Operaciones LIMIT 10";
			$resulado = $this->db->query($sql);
			while ($values = $resulado->fetch(PDO::FETCH_ASSOC)){
				$this->operaciones[] = $values;
			}
			return $this->operaciones;
		}
	}
 ?>  