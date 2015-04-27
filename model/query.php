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
		}catch(PDOException $e){
			die("Error: " . $e->getMessage());
		}	
	}

	//Retourne le resultat de la requête resQuery sous forme de tableau
	function recoverQueryInArray(){
		$tab = array();
		while($row = $this->resQuery->fetch(PDO::FETCH_ASSOC)){
			$tab[]=$row;
		}
		// echo "<pre>";
		// print_r($tab);
		// echo "</pre>";
		return $tab;
	}

	//Transforme un tableau associatif en json
	function jsonQuery($query){
		return  json_encode($query);
	}
}

?>