$(document).ready(function(){
	//initialisation plugin
	$("#formResp2").validate({
		//règles validation sur chaque champs du formulaire
		rules:{
			//nomResp1DuChamps:
    		nomResp2:{
    			//conditions sur le champs
    			required:true,
    			lettersonly:true
    		},
        lienResp2:"required",
        telResp2:{
          required:true,
          minlength:10,
          regex:/^(0[1-68])(?:[ _.-]?(\d{2})){4}$/
        },
        mailResp2:{
          required:true,
          regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$/
        },
        fixResp2:{
          required:true,
          minlength:10,
          regex:/^(0[1-68])(?:[ _.-]?(\d{2})){4}$/
        },
        prenomResp2:{
          required:true,
          lettersonly:true
        },
        legalResp2:"required",
        adresseResp2:"required",
        CPResp2:{
          required:true,
          digits:true,
          minlength:5
        },
        villeResp2:{
          required:true,
          lettersonly:true
        },
        PSNSID2:"required",
        STEPID2:"required",
        PFSNID2:"required"
      },
    	//messages en cas d'erreur de saisie
    	//selon la condition
  		messages:{
  			nomResp2:{
  				required:"Veuillez saisir votre nom.",
  				lettersonly:"Veuillez saisir des lettres uniquement."
  			},
        lienResp2:"Veuillez sélectionner votre lien de parenté.",
        telResp2:{
          required:"Veuillez saisir votre numéro de téléphone.",
          minlength:$.validator.format("Veuillez fournir au moins {0} caractères."),
          regex:"Veuillez un numéro de téléphone correct."
        },
        mailResp2:{
          required:"Veuillez saisir votre Email.",
          regex:"Veuillez saisir une adresse mail correcte."
        },
        fixResp2:{
          required:"Veuillez saisir votre numéro de téléphone.",
          minlength:$.validator.format("Veuillez fournir au moins {0} caractères."),
          regex:"Veuillez un numéro de téléphone correct."
        },
        prenomResp2:{
          required:"Veuillez saisir votre nom.",
          lettersonly:"Veuillez saisir des lettres uniquement."
        },
        legalResp2:"Veuillez sélectionner votre statut.",
        adresseResp2:"Veuillez saisir votre adresse.",
        CPResp2:{
          required:"Veuillez saisir le code postal de votre domicile.",
          minlength:$.validator.format("Veuillez fournir au moins {0} caractères."),
          digits:"Veuillez saisir des chiffres uniquement."
        },
        villeResp2:{
          required:"Veuillez saisir votre ville de domicile.",
          lettersonly:"Veuillez saisir des lettres uniquement."
        },
        PSNSID2:"Veuillez saisir votre pays de naissance.",
        STEPID2:"Veuillez sélectionner votre situation d'emploi.",
        PFSNID2:"Veuillez sélectionner votre profession."
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