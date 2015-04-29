<?php

require_once("../view/header.php");
require_once("../view/menu.php");
require_once("../view/index.php");
require_once("../view/foot.php");
require_once("../model/membre.php");
session_start();

$file = basename(__FILE__);     

$html= headerSite("index");

$html.=<<<html
	<script>
$("#resultat").html("<p>test !</p>");
	$(document).ready(function(){

	    $("#bouton").click(function{
				
	        $.post(
	            'traitementListeTrajet.php', // Un script PHP que l'on va créer juste après
	            {
	                date : $("#date").val();  // Nous récupérons la valeur de nos inputs que l'on fait passer à connexion.php	                
	            },

	            function(data){
	            	if(date = "succes"{
	            		$("#resultat").html("<p>succès !</p>");
	            	}	            	
	            },

	            'text' // Nous souhaitons recevoir "Success" ou "Failed", donc on indique text !
	         );

	    });

	});

</script>

html;

$html.= menu($file);
$html.= contenu("traitementListeTrajet.php");
$html.= "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>";
$html.= foot();

echo $html;
        
      
    