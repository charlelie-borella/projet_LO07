$(function() {

	var success ="<input type='text' class='form-control' id='inputSuccess2' aria-describedby='inputSuccess2Statu' <span class='glyphicon glyphicon-ok form-control-feedback' aria-hidden='true'></span>";
	var res = true;
	

	$("#prnm").change(function() {
		if ( $("#prnm").val() == ""  ) {
			res = false;
			$( "#formPrnm" ).attr({
			  class: "form-group has-error"			  
			});
		}
		else{
			$( "#formPrnm" ).attr({
			  class: "form-group has-success"			  
			});
		}
	});	

	
	$("form").submit(function( event ) {
	//Vérification champ NOM
		if ( $("#nom").val() == "" ) {		  	
			var res = false;	  	
		}

		if ( $("#prnm").val() == "" ) {		  	
			var res = false;	  	
		}
	//Vérification champ PRENOM			
	
		if( $("#jour option:selected").val() == "-" ||  $("#mois option:selected").val() == "-" || $("#annee option:selected").val() == "-"){
			res = false;
			$( "#formDate" ).attr({
				class: "form-group has-error"			  
			});			
		}
		else{
			$( "#formDate" ).attr({
				class: "form-group has-success"			  
			});
		}


		
			

			

		//Vérification champ MAIL
		if ( $("#mail").val() == "") {
			res = false;
			$( "#formMail" ).attr({
			 	class: "form-group has-error"			  
			});
		}
		else{
			$( "#formMail" ).attr({
			  	class: "form-group has-success"			  
			});
		}

		//Vérification champ TEL
		if ( $("#tel").val() == "") {
			res = false;
			$( "#formTel" ).attr({
			  class: "form-group has-error"			  
			});
		}
		else{
			$( "#formTel" ).attr({
			  class: "form-group has-success"			  
			});
		}
		 
			return res;
		});
});