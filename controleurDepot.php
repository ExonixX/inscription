<?php

     //pour pouvoir utiliser la classe NaturePieceDAO()
     require_once('modele/BD.NaturePiece.inc.php');
     //pour pouvoir utiliser la classe DepotDAO()
     require_once('modele/BD.Depot.inc.php');
     //pour pouvoir utiliser la classe DeposerDAO()
     require_once('modele/BD.Deposer.inc.php');

     //nouvel objet nature piece
     $np= new NaturePieceDAO();

     //nouvel objet depot
     $depot= new DepotDAO();

     //liste des pieces à fournir
     $listepieces = $np->getNaturePiece();

     //liste des pieces déposées par l'étudiant
     $etatpiece = $depot->piecesDepotByIdEtudiant($_SESSION['idetudiant']);

     // Fonction d'upload de fichier -> VueDepot
     if(isset($_POST['Envoyer']))
     {
          $dossier = 'upload/'.$_SESSION['num'].'/';

          //taille max fichier autorisé
          $taille_max = 10000000;

          //types de format fichier upload autorisés
          $format_autorise = array('png','jpg','jpeg');

          //tableau qui va stocker id de la nature de la piece à upload
          $listepiecedeposee=array();

          //pour toutes les pieces à upload
          for($i=0;$i<(count($listepieces)-count($etatpiece));$i++)
          {
               //on regarde si une piece a été uploadé
               //si la taille du fichier est différent de 0
               if($_FILES['piece'.$i]['size']<>0)
               {
                    //on stocke l'id de la nature de la piece à upload
                    $listepiecedeposee[] = $_POST['numnaturepiece'.$i];

                    //recupere le nom donné au fichier lors de son upload
                    $fichier = basename($_FILES['piece'.$i]['name']);

                    //format du fichier uploadé
                    // strrchr : rentre l'extension avec le point (" . ")
                    // substr(chaine,1) : ignore le premier caractere de chaine
                    // strtolower : met l'extension en minuscule
                    $format_fichier = strtolower( substr( strrchr($_FILES['piece'.$i]['name'],'.'),1));

                    //Début des vérifications de sécurité...
                    //si le format du fichier uploadé n'est pas dans le tableau
                    if(!in_array($format_fichier, $format_autorise))
                    {
                         $erreur = 'Vous devez uploader un fichier de type png, jpg, jpeg';
                    }
                    //si la taille du fichier dépasse la taille max autorisé
                    if($_FILES['piece'.$i]['size']>$taille_max)
                    {
                         $erreur = 'Le fichier est trop gros...';
                    }

                    //S'il n'y a pas d'erreur, on upload
                    if(!isset($erreur))
                    {
                         //On formate le nom du fichier ici...
                         $fichier = strtr($fichier, 
                                   'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
                                   'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                         $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
                                        
                         //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                         if(move_uploaded_file($_FILES['piece'.$i]['tmp_name'], $dossier . $fichier))
                         {

                              //nouvel objet depot
                              $depot1= new DepotDAO();

                              //insert dans la table PIECE DEPOSER
                              $depot1->insertNewDepot($fichier,$dossier.$fichier,$_POST['numnaturepiece'.$i]);

                              //recuperation id du dernier insert
                              $lastdepot=$depot1->lastInsertId();
                              
                              //conversion en Int
                              $lastdepot=intval($lastdepot);

                              //nouvel objet deposer
                              $deposer= new DeposerDAO;

                              //insert dans la table deposer
                              $deposer->insertNewDeposer($_SESSION['idetudiant'], $lastdepot);

                              echo 'Upload effectué avec succès !';                   
                         }
                         //Sinon (la fonction renvoie FALSE)
                         else
                         {
                              echo 'Echec de l\'upload !';
                         }
                    }
                    else
                    {
                         echo $erreur;
                    }
               }
          }

          $_SESSION['tablistpiecedepot']=$listepiecedeposee;
          
          header('Location: index.php?m=Accueil');
     }
     else
     {
          //injection dans la vue
          require_once 'vues/vueDepot.php';
     }
?>