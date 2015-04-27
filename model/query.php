<?php

require_once ("connexionBD.php");

class Query{
	
	private $myBase;

	function __construct($myBase){
		$this->myBase=$myBase;
	}

	function queryBD($query){
		try{
			return $this->myBase->query($query);
		}catch(PDOException $e){
			die("Error: " . $e->getMessage());
		}	
	}

	//Récupère juste la requête et le stock dans un tableau
	function recoverQuery($res){
		$tab = array();
		while($row = $res->fetch(PDO::FETCH_ASSOC)){
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