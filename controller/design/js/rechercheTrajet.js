$(function() {

	  //POST : Affichage une liste de ville de départ selon le jour sélectionné.
	  $("#date").change(function(){
	  		//On remet à zero les listes départ et arrivée
	  		$("#villeDep option").remove();
	    	$("#villeDep").append(new Option("Ville de départ",0));

	    	$("#villeAr option").remove();
	  		$("#villeAr").append(new Option("Ville d'arrivée",0));

	  		//On désactive le bouton
	    	$("#bouton").attr('disabled','disabled');

	        $.post(
	            'traitementListeTrajet.php', // Un script PHP que l'on va créer juste après
	            {
	                date : $("#date").val()  // Nous récupérons la valeur de nos inputs que l'on fait passer à connexion.php                
	            },

	            function(data){
	            	var tab = $.parseJSON(data);	            		
	            	jQuery.each(tab, function( i, val ) {
	            		$("#villeDep").append(new Option(val,val));	            	
	            	});
	            }
	         );
	    });

	  //POST quand on sélectionne une ville de départ -> retourne une liste de ville d'arrivée selon la ville de départ sélectionné
	  $("#villeDep").change(function(){

	  		$("#villeAr option").remove();
	  		$("#villeAr").append(new Option("Ville d'arrivée",0));	  	
	  		$( "#villeDep option:selected" ).each(function() {
	  			//alert($("#villeDep").val());	  	
	        	$.post(
	           	 	'traitementListeTrajet.php',
		            {
		                date : $("#date").val(),
		                villeDep : $("#villeDep").val()                
		            },

		            function(data){
		            	var tab = $.parseJSON(data);
		            	jQuery.each(tab, function( i, val ) {
		            	//alert(val);	            		
		            		$("#villeAr").append(new Option(val,val));	            	
		            	});
		            }
	        	);
	   	 	});
	  });

	  //Active le bouton quand on à sélectionné une ville d'arrivée
	  $("#villeAr").change(function(){
			$( "#villeDep option:selected" ).each(function() {
				$( "#bouton").removeAttr('disabled')
			});
	  });
});
