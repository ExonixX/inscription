$(document).ready(function(){
    //initialisation plugin
    $("#formInscription").validate({
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
            sexe:"required",
            ine:{
                //required:true,
                minlength:11,
                regex:/^[0-9]{10}[A-Z]{1}$/

            },
            datenaiss:{
              required:true,
              regex:/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/
            },
            lieunaiss:{
              required:true,
              regex:/^[a-zéèàùûêâôë\- \']*$/i
            },
            cpnaiss:{
              required:true,
                digits:true
                },
            boursier:"required",
            adressetu:"required",
            cpadressetu:{
                required:true,
                digits:true
            },
            villeadressetu:{
                required:true,
                regex:/^[a-zéèàùûêâôë\- \']*$/i
            },
            tel:{
                required:true,
                minlength:10,
                regex:/^(0[1-68])(?:[ _.-]?(\d{2})){4}$/
            },
            mail:{
                required:true,
                regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$/
            },
            cycle:"required",
            doublement:"required",
            lv1etu:{
              required:true,
              lettersonly:true
            },
            lv2etu:{
              lettersonly:true
            },
            anctypeetab:"required",
            ancetab:{
              required:true,
              regex:/^[a-zéèàùûêâôë\- \']*$/i
            },
            ancclasse:{
              required:true,
              regex:/^[a-zéèàùûêâôë\- \'0-9]*$/i
            },
            ancacdm:{
              required:true,
              regex:/^[a-zéèàùûêâôë\- \']*$/i
            },
            anccp:{
              required:true,
              digits:true
            },
            ancville:{
              required:true,
              regex:/^[a-zéèàùûêâôë\- \']*$/i
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
                required:"Veuillez saisir notre prénom.",
                regex:"Veuillez saisir des lettres ou des caractères uniquement."
            },
            sexe:"Veuillez sélectionner votre sexe.",
            ine:{
                required:"Veuillez saisir votre numero INE.",
                minlength:$.validator.format("Veuillez fournir au moins {0} caractères."),
                regex:"Veuillez saisir un bon numéro INE."
            },
            datenaiss:{
              required:"Veuillez saisir votre date de naissance.",
              regex:"Veuillez une saisir une date dans le format JJ/MM/AAAA."
            },
            lieunaiss:{
                required:"Veuillez saisir votre lieu de naissance.",
                regex:"Veuillez saisir des lettres ou des caractères uniquement."
            },
            cpnaiss:{
                required:"Veuillez saisir le code postal de votre lieu de naissance.",
                digits:"Veuillez saisir des chiffres uniquement."
            },
            boursier:"Veuillez sélectionner votre statut.",
            adressetu:"Veuillez saisir votre adresse de domicile.",
            cpadressetu:{
                required:"Veuillez saisir le code postal de votre domicile.",
                digits:"Veuillez saisir des chiffres uniquement."
            },
            villeadressetu:{
                required:"Veuillez saisir la ville de votre domicile.",
                regex:"Veuillez saisir des lettres ou des caractères uniquement."
            },
            tel:{
                required:"Veuillez saisir votre numéro de téléphone.",
                minlength:$.validator.format("Veuillez fournir au moins {0} caractères."),
                regex:"Veuillez un numéro de téléphone correct."
            },
            mail:{
                required:"Veuillez saisir votre Email.",
                regex:"Veuillez saisir une adresse mail correcte."
            },
            cycle:"Veuillez sélectionner votre cycle d'étude.",
            doublement:"Veuillez sélectionner s'il s'agit d'un doublement.",
            lv1etu:{
              required:"Veuillez saisir votre langue LV1",
              lettersonly:"Veuillez saisir des lettres uniquement."
            },
            lv2etu:{
              lettersonly:"Veuillez saisir des lettres uniquement."
            },
            anctypeetab:"Veuillez sélectionner le type de l'établissement.",
            ancetab:{
              required:"Veuillez sélectionner le nom de votre établissement.",
              regex:"Veuillez saisir des lettres ou des caractères uniquement."
            },
            ancclasse:{
              required:"Veuillez saisir votre classe actuelle.",
              regex:"Veuillez saisir que des lettres ou des chiffres"
            },
            ancacdm:{
              required:"Veuillez saisir votre académie.",
              regex:"Veuillez saisir des lettres ou des caractères uniquement."
            },
            anccp:{
              required:"Veuillez saisir le code postal de l'établissement de votre année finissante.",
              digits:"Veuillez saisir des chiffres uniquement."
            },
            ancville:{
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