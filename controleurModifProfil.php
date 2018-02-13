<?php

	if(isset($_POST['modifinfoperso']) || isset($_POST['modifinfoetu']) )
	{
		require_once 'controleurModifProfilPerso.php';
	}
	elseif (isset($_POST['parent0']) ||isset($_POST['parent1']) || isset($_POST['modifinforesp']) || isset($_POST['modifinforesp1']) || isset($_POST['modifinforesp2']))
	{
		require_once 'controleurModifParent.php';
	}
	else
	{
		require_once 'vues/vueModifProfil.php';
	}

?>