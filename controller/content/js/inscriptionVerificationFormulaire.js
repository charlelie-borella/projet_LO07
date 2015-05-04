$(function() {

	var success ="<input type='text' class='form-control' id='inputSuccess2' aria-describedby='inputSuccess2Statu' <span class='glyphicon glyphicon-ok form-control-feedback' aria-hidden='true'></span>";
	
	
	$("form").submit(function( event ) {
		var res = true;
	//Vérification champ NOM
		if ( $("#nom").val() == ""  ) {
			res = false;
			$( "#formNom" ).attr({
			  class: "form-group has-error"			  
			});
		}
		else{
			$( "#formNom" ).attr({
			  class: "form-group has-success"			  
			});
		}

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
		
		if( $( "#pass1" ).val() == "" || $( "#pass1" ).val() != $( "#pass2" ).val() ){
		 res = false;
			$( "#formPass1" ).attr({
			  class: "form-group has-error"			  
			});
			$( "#formPass2" ).attr({
			  class: "form-group has-error"			  
			});
		}
		else{			
			$( "#formPass1" ).attr({
			  class: "form-group has-success"			  
			});
			$( "#formPass2" ).attr({
			  class: "form-group has-success"			  
			});

		}
		return res;
	});

});