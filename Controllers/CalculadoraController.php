<?php 
	class CalculadoraController {

		public function __construct (){
			require_once("Models/Operacion.php");
		}

		public function index ($alert = null){
			$Operaciones = new Operacion; 
			$data['operaciones'] = $Operaciones->all();

			return $this->view("Views/calculator/index.php",compact('data'));
		}
 
		public function operacion (){
			$post = json_decode(file_get_contents('php://input'), true);
			$data = $this->validator($post);
			if ($data){
				switch ($data['operacion']){
					case 'sumar':
						$this->sumar($data['num1'],$data['num2'],$data['operacion']);
						break;
					case 'restar':
						$this->restar($data['num1'],$data['num2'],$data['operacion']);
						break;
					case 'multiplicar':
						$this->multiplicar($data['num1'],$data['num2'],$data['operacion']);
						break;
					case 'dividir':
						$this->dividir($data['num1'],$data['num2'],$data['operacion']);
						break;
				}
			}
		}

		public function validator (array $request){
			if (!is_numeric($request['num1']) && is_numeric($request['num2'])){
				echo json_encode(array("Error" => "solo se permiten números"));
				exit();
			}
			return $request;
		}

		public function sumar ($num1, $num2, $operacion){
			$this->store($num1, $num2, $operacion, ($num1+$num2));
			echo json_encode(($num1+$num2));
			exit();
		}

		public function restar ($num1, $num2, $operacion){			
			$this->store($num1, $num2, $operacion, ($num1-$num2));
			echo json_encode(($num1-$num2));
			exit();
		}

		public function multiplicar ($num1, $num2, $operacion){	
			$this->store($num1, $num2, $operacion, ($num1*$num2));		
			echo json_encode(($num1*$num2));
			exit();
		}

		public function dividir ($num1, $num2, $operacion){			
			$this->store($num1, $num2, $operacion, ($num1/$num2));
			echo json_encode(($num1/$num2));
			exit();
		}

		public function store ($num1, $num2, $operacion, $resulado){
			$Operacion = new Operacion;
			$Operacion->save($num1, $num2, $operacion, $resulado); 
		}

		function view($page,$variables=[])
		{
		    if(count($variables))
		    {
		        extract($variables);
		    }
		    require_once $page;
		}

	}
 ?> 