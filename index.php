<?php


	require_once("config.php"); //Importa o arquivo de configuracao, que tem o autoload

	$sql = new sql(); //acha a classe Sql, já criada
	$usuarios = $sql -> select("SELECT * FROM tbUsuarios"); // Uma vez na classe sql entra na classe select e passa o comando sql que quer executar no banco

	echo json_encode($usuarios);
	//print_r($usuarios);

?>