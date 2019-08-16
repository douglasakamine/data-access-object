<?php

class Sql extends PDO {  // Classe Sql herda da classe PDO que é classe nativa do PHP

	private $conn; // atributo de conexão

	public function __construct(){ //Metodo construtor é chamado automaticamente quando a classe é instanciada

	 // $this->conn = new PDO("sqlsrv:Database=dbphp7;server=localhost\SQLEXPRESS;ConnectionPooling=0","sa","root");  // SQL SERVER
		$this->conn = new PDO("mysql:dbname=dbphp7;host=localhost", "root", "");   //MYSQL
	}

	private function setParams($statement, $parameters = array()){   // funcao de setar multiplos parametros, chamado pelo metodo query
		foreach ($parameters as $key => $value){
			$this->setParam($statement, $key, $value);
		}
	}

	private function setParam($statement, $key, $value){  // funcao de setar apenas 1 parametro, chamado pelo metodo query
		$statement->bindParam($key, $value);
	}

	public function query($rawQuery, $params = array()){ // metodo query recebe o comando do banco, prepara e executa
		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();
		return $stmt;

	}
	
	public function select($rawQuery, $params = array()):array{  // comando para dar select no banco

		$stmt = $this->query($rawQuery, $params);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}
}


?>