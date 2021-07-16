<?php

class sql extends PDO{ //essa classe vai extender da classe PDO que é nativa do sistema onde tem bind, etc

	private $conn; //define uma variável privada para a conexão

	public function __construct(){ //criando um método construtor	

		$this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", ""); //faz a conexão com o banco
	}

	private function setParams($statement,$parameters=array()){

		foreach($parameters as $key => $value){//associar os parametros a esse comando

			$this-> setParam($key,$value);

		}

	}
	
	private function setParam($statement, $key, $valor){

		$statement -> bindParam($key, $value);

	}


	public function query($rawQuery,$params = array()){ //funcão para preparar comandos que nao esperam resposta como DEL ou Update que receberá 2 paramentros: o 1º sendo a variável com o sql e o segundo já sendo um array como padrão

		$stmt = $this -> conn->prepare($rawQuery);

		$this -> setParams($stmt,$params);

		$stmt->execute();

		return $stmt;

	}

	public function select($rawQuery,$param = array()):array
	{

		$stmt = $this->query($rawQuery,$param);

		return $stmt -> fetchAll(PDO::FETCH_ASSOC);//PDO::FETCH_ASSOC mostrar os daddos apenas de forma associativa, sem os números de arrays e etc
		
	}

}



?>