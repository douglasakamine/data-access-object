<?php

class Sql extends PDO {  // Classe Sql herda da classe PDO que é classe nativa do PHP

	private $conn; // atributo de conexão

	public function __construct(){ //Metodo construtor é chamado automaticamente quando a classe é instanciada

		$this->conn = new PDO("sqlsrv:Database=dbphp7;server=localhost\SQLEXPRESS;ConnectionPooling=0","sa","root");

	}

	private function setParams($statement, $parameters = array()){
		foreach ($parameters as $key => $value){
			$this->setParam($statement, $key, $value);
		}
	}

	private function setParam($statement, $key, $value){
		$statement->bindParam($key, $value);
	}

	public function query($rawQuery, $params = array()){
		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();
		return $stmt;

	}
	
	public function select($rawQuery, $params = array()):array{

		$stmt = $this->query($rawQuery, $params);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}
}


?>