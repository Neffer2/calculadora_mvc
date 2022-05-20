<?php 
	require_once("Config/config.php");
	require_once("Core/routes.php");
	require_once("Config/database.php");
	require_once("Controllers/CalculadoraController.php");

	//Si existe la ruta de controlador, si no, carga lo predeterminado
	if (isset($_GET['c'])){
		$controller = get_controller($_GET['c']);

		//Si existe la ruta del controlador con metodo, si no, carga lo predeterminado
		if (isset($_GET['a'])){ 

			//Si existe la ruta del controlador con metodo con id, si no, carga el metodo sin id
			if (isset($_GET['id'])){
				get_action($controller,$_GET['a'],$_GET['id']);
			}else{
				get_action($controller,$_GET['a']);
			}
		}else{
			get_action($controller,MAIN_ACTION);
		}
		 
	}else {
		$controller = get_controller(MAIN_CONTROLLER);
		get_action($controller,MAIN_ACTION);
	}
 ?> 