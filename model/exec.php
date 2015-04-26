<?php

require_once ("connexion.php");

class Exec{

	private $myBase;

	function __construct($mybase){
		$this->myBase=$mybase;
	}

	//Créer une requête "insert into" à partir d'une tableau associatif 
	function createExecFromArray($data){
		echo "<pre>";
			print_r($data);
		echo "</pre>";
		$insert ="INSERT INTO ";
		$values =" VALUES(";
		foreach ($data as $key => $value) {
			$insert.=$key . "(";
			$i=0;
			foreach ($value as $key1 => $value1) {
				$values.=$value1;
				$insert.=$key1;
				$i++;
				if($i < sizeof($data[$key])){
					$values.=", ";
					$insert.=", ";
				}				
			}
			$insert.=")";
			$values.=")";
		}
		return $insert . $values;
	}

	//Créer une requête à partir d'un objet json
	function createExecFromJson($data){

		$array = json_decode($data, true);

		return $this->createExecFromArray($array);

	}

	//exécute une requête
	function execBD($query){
		var_dump($query);
		try{
			$this->myBase->exec($query);
		}catch(PDOException $e){
			die("Error: " . $e->getMessage());
		}	
	}

	
}