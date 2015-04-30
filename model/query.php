<?php

require_once ("connexionBD.php");

class Query{
	
	private $myBase;
	private $resQuery;

	function __construct($myBase){
		$this->myBase=$myBase;
	}

	//Retourne le resultat de la requête brute après interrogation de la base de données
	function getQuery(){
		return $this->resQuery;
	}

	//Exécute une requête, stock le resultat dans resQuery
	function queryBD($query){
		try{
			$this->resQuery = $this->myBase->query($query);
			return $this->resQuery;
		}catch(PDOException $e){
			die("Error: " . $e->getMessage());
		}	
	}

	//Retourne le resultat de la requête resQuery sous forme de tableau 2D
	function recoverQueryInArray(){
		$tab = array();	
		while($row = $this->resQuery->fetch(PDO::FETCH_ASSOC)){
			$tab[]=$row;
		}

		return $tab;
	}

	//Retourne le resultat de la requête resQuery sous forme de tableau 1D
	function recoverSimpleArray($key, $param){
		$tab = array();
		while($row = $this->resQuery->fetch(PDO::FETCH_ASSOC)){
			$tab["'". $key ."'"]= "'" . $row[$param] . "'";
		}
		
		return $tab;
	}

	//Transforme un tableau associatif en json
	function jsonQuery($query){
		return  json_encode($query);
	}
}

?>