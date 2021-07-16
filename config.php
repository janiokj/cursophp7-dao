<?php
spl_autoload_register(function($class_name){

	$fileName = "classes".DIRECTORY_SEPARATOR.$class_name.".php";//DIRECTORY_SEPARATOR Equivale a barra para separação de pastas

	if(file_exists($fileName)){
		require_once($fileName);
	}
})

?>