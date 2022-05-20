<?php 
	/*
	* Redirige la ruta a un controlador
	*/
	function get_controller($controller){
		$name_contoller = ucwords($controller)."Controller";
		$file_controller = "Controllers/$name_contoller".".php";

		//Si no existe, redirige al controlador por defecto.
		if (!is_file($file_controller)){
			$file_controller = 'Controllers/'.MAIN_CONTROLLER.".php";
		}

		//Lamma el controlador
		require_once($file_controller);
		//Instancia la funcion
		$controller = new $name_contoller();
		return $controller;
	}

	/*
	* Redirige la ruta a un metodo
	*/
	function get_action ($controller, $action, $id = null){
		//Verifica que la accion existe.
		if (isset($action) && method_exists($controller, $action)){
			if ($id == null){
				//Trae el metodo que
				$controller->$action();
			}else{
				$controller->$action($id);
			}
		}else{
			//Utilizo una auxiliar porque php reconoce la constante como variable.
			$temp = MAIN_ACTION;
			$controller->$temp();
		}
	}
 ?>