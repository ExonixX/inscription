$(document).ready(function(){
	//initialisation plugin
	$("#formModifResp").validate({
		//règles validation sur chaque champs du formulaire
		rules:{
        modifenfantsco:"required",
        modifnbenfant:"required",
        modifresplegal:"required",
    		//nomResp1DuChamps:
        modifnomresp:{
    			//conditions sur le champs
    			required:true,
    			lettersonly:true
    		},
        modifprenomresp:{
          required:true,
          lettersonly:true
        },
        modiflienresp:"required",
        modifnumtelresp:{
          required:true,
          minlength:10,
          regex:/^(0[1-68])(?:[ _.-]?(\d{2})){4}$/
        },
        modifnumfixresp:{
          required:true,
          minlength:10,
          regex:/^(0[1-68])(?:[ _.-]?(\d{2})){4}$/
        },
        modifemailresp:{
          required:true,
          regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$/
        },
        modifadresseresp:"required",
        modifcpadresseresp:{
          required:true,
          digits:true,
          minlength:5
        },
        modifvilleadresseresp:{
          required:true,
          lettersonly:true
        }  		
    	},
    	//messages en cas d'erreur de saisie
    	//selon la condition
  		messages:{
        modifenfantsco:"Veuillez saisir le nombre d'enfants scolarisés.",
        modifnbenfant:"Veuillez saisir le nombre d'enfants total.",
        modifresplegal:"Veuillez sélectionner un statut.",
        modifnomresp:{
          required:"Veuillez saisir votre nom.",
          lettersonly:"Veuillez saisir des lettres uniquement."
        },
        modifprenomresp:{
          required:"Veuillez saisir votre prénom.",
          lettersonly:"Veuillez saisir des lettres uniquement."
        },
        modiflienresp:"Veuillez sélectionner votre lien de parenté.",
        modifnumtelresp:{
          required:"Veuillez saisir votre numéro de téléphone.",
          minlength:$.validator.format("Veuillez fournir au moins {0} caractères."),
          regex:"Veuillez un numéro de téléphone correct."
        },
        modifnumfixresp:{
          required:"Veuillez saisir votre numéro de téléphone fix.",
          minlength:$.validator.format("Veuillez fournir au moins {0} caractères."),
          regex:"Veuillez un numéro de téléphone correct."
        },
        modifemailresp:{
          required:"Veuillez saisir votre Email.",
          regex:"Veuillez saisir une adresse mail correcte."
        },
        modifadresseresp:"Veuillez saisir votre adresse.",
        modifcpadresseresp:{
          required:"Veuillez saisir le code postal de votre domicile.",
          digits:"Veuillez saisir des chiffres uniquement.",
          minlength:$.validator.format("Veuillez fournir au moins {0} caractères.")
        },
        modifvilleadresseresp:{
          required:"Veuillez saisir votre ville de domicile.",
          lettersonly:"Veuillez saisir des lettres uniquement."
        } 
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
  	   },"erreur expression reguliere"
  	);
});