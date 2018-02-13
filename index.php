<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inscription</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <!--Pour faire un calendrier Jquery dans les formulaires-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="/resources/demos/style.css">

</head>

<body>
    
<?php

    session_start();
    
    require_once('controleur/controleurPrincipal.php');
?>

<!--jquery-->
    <script type="text/javascript" src="jquery/librairies/jquery.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: "c-30:nnnn",
                dateFormat: "dd/mm/yy"
            });
        } );
    </script>

    <!--jquery validation form-->
    <script type="text/javascript" src="jquery/librairies/jquery.validate/dist/jquery.validate.min.js"></script>
    <script type="text/javascript" src="jquery/librairies/jquery.validate/dist/additional-methods.js"></script>
    <!-- Mes scripts jQuery-->
    <script type="text/javascript" src="jquery/scripts/scriptFormInscription.js"></script>
    <script type="text/javascript" src="jquery/scripts/scriptFormResp1.js"></script>
    <script type="text/javascript" src="jquery/scripts/scriptFormResp2.js"></script>
    <script type="text/javascript" src="jquery/scripts/scriptModifFormPerso.js"></script>
    <script type="text/javascript" src="jquery/scripts/scriptFormModifResp.js"></script>
    <script type="text/javascript" src="jquery/scripts/scriptFormCompte.js"></script>



</body>
</html>

    
    