<?php

require_once("connexionBD.php");

class Exec{

	private $myBase;

	function __construct($mybase){
		$this->myBase=$mybase;
	}

	//Créer une requête "insert into" à partir d'une tableau associatif 
	function createExecFromArray($data){
		// echo "<pre>";
		// 	print_r($data);
		// echo "</pre>";
		$insert ="INSERT INTO ";
		$values =" VALUES(";
		foreach ($data as $key => $value) {
			$insert.=$key . "(";
			$i=0;
			foreach ($value as $key1 => $value1) {
				if(!mb_check_encoding($value1, 'UTF-8'))
				{
					echo "ERREUR ENCODAGE";
				}	
				$values.="'". $value1 . "'";
				$insert.= $key1;
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

	//exécute une requête
	function execBD($query){
		//var_dump($query);
		try{
			$this->myBase->exec($query);
		}catch(PDOException $e){
			die("Error: " . $e->getMessage());
		}	
	}

	
}