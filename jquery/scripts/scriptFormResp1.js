$(document).ready(function(){
	//initialisation plugin
	$("#formResp1").validate({
		//règles validation sur chaque champs du formulaire
		rules:{
			//nomResp1DuChamps:
    		nomResp1:{
    			//conditions sur le champs
    			required:true,
    			lettersonly:true
    		},
        lienResp1:"required",
        telResp1:{
          required:true,
          minlength:10,
          regex:/^(0[1-68])(?:[ _.-]?(\d{2})){4}$/
        },
        mailResp1:{
          required:true,
          regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$/
        },
        fixResp1:{
          required:true,
          minlength:10,
          regex:/^(0[1-68])(?:[ _.-]?(\d{2})){4}$/
        },
        prenomResp1:{
          required:true,
          lettersonly:true
        },
        legalResp1:"required",
        enfantsco:"required",
        nbenfant:"required",
        adresseresp1:"required",
        CPresp1:{
          required:true,
          digits:true,
          minlength:5
        },
        villeresp1:{
          required:true,
          lettersonly:true
        },
        PSNSID:"required",
        STEPID:"required",
        PFSNID:"required",
        responsable2:"required"    		
    	},
    	//messages en cas d'erreur de saisie
    	//selon la condition
  		messages:{
  			nomResp1:{
  				required:"Veuillez saisir votre nom.",
  				lettersonly:"Veuillez saisir des lettres uniquement."
  			},
        lienResp1:"Veuillez sélectionner votre lien de parenté.",
        telResp1:{
          required:"Veuillez saisir votre numéro de téléphone.",
          minlength:$.validator.format("Veuillez fournir au moins {0} caractères."),
          regex:"Veuillez un numéro de téléphone correct."
        },
        mailResp1:{
          required:"Veuillez saisir votre Email.",
          regex:"Veuillez saisir une adresse mail correcte."
        },
        fixResp1:{
          required:"Veuillez saisir votre numéro de téléphone.",
          minlength:$.validator.format("Veuillez fournir au moins {0} caractères."),
          regex:"Veuillez un numéro de téléphone correct."
        },
        prenomResp1:{
          required:"Veuillez saisir votre nom.",
          lettersonly:"Veuillez saisir des lettres uniquement."
        },
        legalResp1:"Veuillez sélectionner votre statut.",
        enfantsco:"Veuillez sélectionner le nombre d'enfants scolarisés.",
        nbenfant:"Veuillez sélectionner le nombre d'enfant total.",
        adresseresp1:"Veuillez saisir votre adresse.",
        CPresp1:{
          required:"Veuillez saisir le code postal de votre domicile.",
          minlength:$.validator.format("Veuillez fournir au moins {0} caractères."),
          digits:"Veuillez saisir des chiffres uniquement."
        },
        villeresp1:{
          required:"Veuillez saisir votre ville de domicile.",
          lettersonly:"Veuillez saisir des lettres uniquement."
        },
        PSNSID:"Veuillez saisir votre pays de naissance.",
        STEPID:"Veuillez sélectionner votre situation d'emploi.",
        PFSNID:"Veuillez sélectionner votre profession.",
        responsable2:"Veuillez sélectionner votre choix."
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