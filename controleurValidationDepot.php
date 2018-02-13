<?php

	//pour pouvoir utiliser la classe DepotDAO()
    require_once('modele/BD.Depot.inc.php');
    //pour pouvoir utiliser la classe EtudiantDAO()
    require_once('modele/BD.Etudiant.inc.php');
    //pour pouvoir utiliser la classe NaturePieceDAO()
	require_once('modele/BD.NaturePiece.inc.php');
	//pour pouvoir utiliser la classe DeposerDAO()
    require_once('modele/BD.Deposer.inc.php');

    //nouvel objet depot
    $depot = new DepotDAO();

    //on recupere toutes les pieces déposées
    $alldepot = $depot->allDepot();

    //######################################################################################################################
    //on recupère les id de l'étudiant de la piece déposée
    //dans le tableau $listeidetudepot

    $listeidetudepot = array();

    for($i=0;$i<count($alldepot);$i++)
    {
    	//nouvel objet depot
    	$deposer = new DeposerDAO();
    	$listeidetudepot[]=$deposer->searchIdEtuByIdPieceDeposee($alldepot[$i]->get_PIDEID()); 
    }

    //on recupère le nom et prenom de l'étudiant de la piece déposée
    //dans le tableau $listeetudepot

    $listeetudepot = array();

    for($i=0;$i<count($alldepot);$i++)
    {
    	//nouvel objet depot
    	$etu = new EtudiantDAO();
    	$listeetudepot[]=$etu->GetEtudiantByCode($listeidetudepot[$i][0]->get_EDNTID()); 
    }

    //######################################################################################################################
    //on recupère les id de la nature de piece déposée
    //dans le tableau $listeidnaturepiecedepot
    
    $listeidnaturepiecedepot = array();

    for($i=0;$i<count($alldepot);$i++)
    {
    	$listeidnaturepiecedepot[]=$alldepot[$i]->get_NTPCID(); 
    }

    //on recupère les intitulés de la nature de piece déposée
    //dans le tableau $listenaturepiecedepot
	
	$listenaturepiecedepot = array();

    for($i=0;$i<count($listeidnaturepiecedepot);$i++)
    {
    	//nouvel objet naturepiece
    	$nat = new NaturePieceDAO();
    	$listenaturepiecedepot[]=$nat->searchNaturePieceById($listeidnaturepiecedepot[$i]); 
    }

    //#######################################################################################################################

    if(isset($_POST['EnvoyerValidation']))
    {
        //declaration tableau
        $tabidpiecedepotvalidee = array();
        $tabidpiecedepotrefusee = array();
        $tabcheminpiecedepotsuppr = array();

        //on boucle pour voir quelle bouton radio est sur "Valider"
        for ($i=0; $i < count($alldepot); $i++)
        {    
            //si on a une valeur dans un bouton radio car null si on coche rien
            if(isset($_POST['validation'.$i]))
            {
                $idpiecedepot=$_POST['idpiecedepot'.$i];

                $etatvalidation=$_POST['validation'.$i];

                //si c'est validé
                if($etatvalidation==true)
                {
                    //on stocke les id dans un tableau
                    $tabidpiecedepotvalidee[] = $idpiecedepot;
                }

                //si c'est refusé
                if($etatvalidation==false)
                {
                    //on stocke les id dans un tableau
                    $tabidpiecedepotrefusee[] = $idpiecedepot;
                    //on stocke les chemin des pieces dans un tableau
                    $tabcheminpiecedepotsuppr[]=$alldepot[$i]->get_PIDECHEMIN();
                }
            }
        }

        //on parcourt le tableau
        for ($i=0; $i < count($tabidpiecedepotvalidee) ; $i++)
        {
            $dep = new DepotDAO();
            //et on valide les pieces cochées "Valider"
            $req=$dep->updatePieceDepot($tabidpiecedepotvalidee[$i]);
        }

        for ($i=0; $i < count($tabidpiecedepotrefusee) ; $i++)
        {
            //supprimer l'image
            //unlink(chemin de l'image)
            unlink($tabcheminpiecedepotsuppr[$i]);

            //$tabidpiecedepotrefusee[$i] : correspond aux id des pieces déposées refusées

            //supprimer dans deposer
            $suppr_deposer = new DeposerDAO();
            $suppr_deposer->deleteDeposer($tabidpiecedepotrefusee[$i]);
            
            //supprimer dans piece_depose
            $suppr_piecedeposee = new DepotDAO();
            $suppr_piecedeposee->deletePieceDepot($tabidpiecedepotrefusee[$i]);
        }

        //rafraichissement du menu ValidationDepot
        header('Location: index.php?m=ValidationDepot');
    }

    require_once 'vues/vueValidationDepot.php';

?>