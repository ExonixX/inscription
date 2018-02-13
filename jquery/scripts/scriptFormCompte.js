$(document).ready(function(){
	//initialisation plugin
	$("#formCompte").validate({
		//règles validation sur chaque champs du formulaire
		rules:{
			//nomDuChamps:
    		nom:{
    			//conditions sur le champs
    			required:true,
    			regex:/^[a-zéèàùûêâôë\- \']*$/i
    		},
    		prenom:{
    			required:true,
    			regex:/^[a-zéèàùûêâôë\- \']*$/i
    		},
    		mail:{
    			regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$/
    		},
    		mdp1:{
    			required:true
    		},
    		mdp2:{
    			required:true,
    			equalTo:mdp1
    		}
    	},
    	//messages en cas d'erreur de saisie
    	//selon la condition
  		messages:{
  			nom:{
  				required:"Veuillez saisir votre nom.",
  				regex:"Veuillez saisir des lettres ou des caractères uniquement."
  			},
  			prenom:{
  				required:"Veuillez saisir votre prénom.",
  				regex:"Veuillez saisir des lettres ou des caractères uniquement."
  			},
  			mail:{
  				regex:"Veuillez saisir une adresse mail correcte."
  			},
    		mdp1:{
    			required:"Veuillez saisir un mot de passe."
    		},
    		mdp2:{
    			required:"Veuillez fournir le même mot de passe.",
    			equalTo:"Veuillez fournir le même mot de passe."
    		}
  		}
  });

	$('#formCompte').submit(function(e){
			if(($('#mdp1').val() !== $('#mdp2').val()))
			{
		        alert('Attention, le mot de passe de confirmation est différent du mot de passe !');
		        e.preventDefault();
		        return false;
		    }
		    else if($('#mdp1').val()=="" || $('#mdp2').val()=="" || $('#nom').val()=="" || $('#prenom').val()=="")
		    {
		    	alert('Veuillez saisir les champs obligatoire.');
		        e.preventDefault();
		        return false;
		    }
		    else
		    {
		    	alert('Votre inscription a bien été prise en compte. Vous allez recevoir un mail de confirmation.');
		        return true;
		    }
	});

	//pour permettre de faire une condition sur le champ, avec une expression régulière
	jQuery.validator.addMethod(
	  "regex",
	   function(value, element, regexp) {
	       if (regexp.constructor != RegExp)
	          regexp = new RegExp(regexp);
	       else if (regexp.global)
	          regexp.lastIndex = 0;
	          return this.optional(element) || regexp.test(value);
	   }
	);
	
});



