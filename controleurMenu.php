<?php
  
  //Pour pouvoir créer un objet Menu()
  require_once ('modele/Menu.inc.php');
  //Pour pouvoir créer un objet Etudiant
  require_once('modele/BD.Etudiant.inc.php');

  $men = new Menu();

  //Nom de l'objet
  $men->setName("menu");
  //si on a une tentative de connexion
  //on stocke le login dans une variable de SESSION
  if(isset($_SESSION['login']))
  {
    //Si le login est un agent,
    if($_SESSION['grade']=="Agent")
    {
      //on crée les menus suivant :
      $men->ajouterLien("Accueil", "Accueil");
      $men->ajouterLien('Fichiers déposés',"ValidationDepot"); // ( ' Nom de l'onglet ' ,' Nom du controleur' )
      $men->ajouterLien('Rechercher un étudiant',"RechercherEtudiant");
      $men->ajouterLien('Pièces justificatives',"NaturePiece");
      $men->ajouterLien('Formation',"Formation");
      $men->ajouterLien('Déconnexion ('.$_SESSION["login"].')', "Deconnexion");
    }

    //Si le login est un étudiant
    if($_SESSION['grade']=="Etudiant")
    {
      $etu = new EtudiantDAO();
      $verif = $etu->searchEtuByIdCompte($_SESSION['num']);
      
      if(!$verif)
      {
        $men->ajouterLien("Inscription", "Inscription");
        $men->ajouterLien('Déconnexion ('.$_SESSION["login"].')', "Deconnexion");
      }
      else
      {
        $men->ajouterLien("Accueil", "Accueil");
        $men->ajouterLien('Dépôt de fichiers',"Depot");
        $men->ajouterLien('Modification profil', "ModifProfil");
        $men->ajouterLien('Déconnexion ('.$_SESSION["login"].')', "Deconnexion");
      }
    }
  }
  else
  {
    $men->ajouterLien("Accueil", "Accueil");
    $men->ajouterLien("Création compte", "Compte");
    $men->ajouterLien("Connexion", "Connexion");
  }

  $men->afficheMenu();

  //si on clique sur un onglet du menu
  if(isset($_GET['m']))
  {
    //si c'est l'onglet Deconnexion du menu
    if($_GET['m']=="Deconnexion")
    {
        //Si le login est un agent,
      if($_SESSION['grade']=="Agent")
      {
        //on supprime les menus suivant :
        $men->supprimeLien('Fichiers déposés');
        $men->supprimeLien('Pièces justificatives');
        $men->supprimeLien('Formation');
        $men->supprimeLien('Déconnexion');
      }

      //Si le login est un étudiant
      if($_SESSION['grade']=="Etudiant")
      {
        //on supprime les onglets
        $men->supprimeLien('Inscription');
        $men->supprimeLien('Dépôt De Fichier');
        $men->supprimeLien('Modification Profil');
        $men->supprimeLien('Déconnexion');
      }
      session_destroy();
      //on revient sur l'Accueil de l'appli
      header('Location: index.php');
    }
    else
    {
      //sinon on va dans l'onglet désiré
      //en passant par le controleur approprié
      require_once('controleur/controleur'.$_GET['m'].'.php');
    }
  }
  //sinon si on clique sur aucun menu
  //on arrive directement dans notre Accueil
  else
  {
    require_once('controleur/controleurAccueil.php');
  }

?>