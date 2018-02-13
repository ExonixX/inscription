$(document).ready(function(){
	//initialisation plugin
	$("#modifInfoPerso").validate({
		//règles validation sur chaque champs du formulaire
		rules:{
			//modifnomDuChamps:
    		modifnom:{
    			//conditions sur le champs
    			required:true,
    			lettersonly:true
    		},
    		modifprenom:{
    			required:true,
    			lettersonly:true
    		},
    		modifine:{
    			//required:true,
    			minlength:11,
    			regex:/^[0-9]{10}[A-Z]{1}$/

    		},
        modifdatenaiss:{
          required:true,
          regex:/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/
        },
    		modiflieunaiss:{
    			required:true,
    			lettersonly:true
    		},
    		modifcpnaiss:{
    			required:true,
    			digits:true,
    			minlength:5
    		},
    		modifboursier:"required",
    		modifadressetu:"required",
    		modifcpadressetu:{
    			required:true,
    			digits:true,
    			minlength:5
    		},
    		modifvilleadressetu:{
    			required:true,
    			lettersonly:true
    		},
    		modiftel:{
    			required:true,
    			minlength:10,
    			regex:/^(0[1-68])(?:[ _.-]?(\d{2})){4}$/
    		},
    		modifmail:{
    			required:true,
    			regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$/
    		},
        modifcycle:"required",
        modifdoublement:"required",
        modiflv1etu:{
          required:true,
          lettersonly:true
        },
        modiflv2etu:{
          lettersonly:true
        },
        modifanctypeetab:"required",
        modifancetab:{
          required:true,
          regex:/^[a-zéèàùûêâôë\- \']*$/i
        },
        modifancclasse:{
          required:true,
          regex:/^[a-zéèàùûêâôë\- \'0-9]*$/i
        },
        modifancacdm:{
          required:true,
          regex:/^[a-zéèàùûêâôë\- \']*$/i
        },
        modifanccp:{
          required:true,
          digits:true
        },
        modifancville:{
          required:true,
          regex:/^[a-zéèàùûêâôë\- \']*$/i
        }
    	},
    	//messages en cas d'erreur de saisie
    	//selon la condition
  		messages:{
  			modifnom:{
  				required:"Veuillez saisir votre modifnom.",
  				lettersonly:"Veuillez saisir des lettres uniquement."
  			},
  			modifprenom:{
  				required:"Veuillez saisir notre prémodifnom.",
  				lettersonly:"Veuillez saisir des lettres uniquement."
  			},
  			modifine:{
  				required:"Veuillez saisir votre numero modifine.",
  				minlength:$.validator.format("Veuillez fournir au moins {0} caractères."),
  				regex:"Veuillez saisir un bon numéro modifine."
  			},
        modifdatenaiss:{
          required:"Veuillez saisir votre date de naissance.",
          regex:"Veuillez une saisir une date dans le format JJ/MM/AAAA."
        },
  			modiflieunaiss:{
  				required:"Veuillez saisir votre lieu de naissance.",
  				lettersonly:"Veuillez saisir des lettres uniquement."
  			},
  			modifcpnaiss:{
  				required:"Veuillez saisir le code postal de votre lieu de naissance.",
  				minlength:$.validator.format("Veuillez fournir au moins {0} caractères."),
  				digits:"Veuillez saisir des chiffres uniquement."
  			},
  			modifboursier:"Veuillez sélectionner votre statut.",
  			modifadressetu:"Veuillez saisir votre adresse de domicile.",
  			modifcpadressetu:{
  				required:"Veuillez saisir le code postal de votre domicile.",
  				minlength:$.validator.format("Veuillez fournir au moins {0} caractères."),
  				digits:"Veuillez saisir des chiffres uniquement."
  			},
  			modifvilleadressetu:{
  				required:"Veuillez saisir la ville de votre domicile.",
  				lettersonly:"Veuillez saisir des lettres uniquement."
  			},
  			modiftel:{
  				required:"Veuillez saisir votre numéro de téléphone.",
  				minlength:$.validator.format("Veuillez fournir au moins {0} caractères."),
  				regex:"Veuillez un numéro de téléphone correct."
  			},
  			modifmail:{
  				required:"Veuillez saisir votre Email.",
  				regex:"Veuillez saisir une adresse Mail correcte."
  			},
        modifcycle:"Veuillez sélectionner votre cycle d'étude.",
        modifdoublement:"Veuillez sélectionner s'il s'agit d'un doublement.",
        modiflv1etu:{
          required:"Veuillez saisir votre langue LV1",
          lettersonly:"Veuillez saisir des lettres uniquement."
        },
        modiflv2etu:{
          lettersonly:"Veuillez saisir des lettres uniquement."
        },
        modifanctypeetab:"Veuillez sélectionner le type de l'établissement.",
        modifancetab:{
          required:"Veuillez sélectionner le nom de votre établissement.",
          regex:"Veuillez saisir des lettres ou des caractères uniquement."
        },
        modifancclasse:{
          required:"Veuillez saisir votre classe actuelle.",
          regex:"Veuillez saisir que des lettres ou des chiffres"
        },
        modifancacdm:{
          required:"Veuillez saisir votre académie.",
          regex:"Veuillez saisir des lettres ou des caractères uniquement."
        },
        modifanccp:{
          required:"Veuillez saisir le code postal de l'établissement de votre année finissante.",
          digits:"Veuillez saisir des chiffres uniquement."
        },
        modifancville:{
          required:"Veuillez saisir la ville de l'établissement de votre année finissante.",
          regex:"Veuillez saisir des lettres uniquement."
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