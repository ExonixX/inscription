<?php

    require_once 'NaturePiece.inc.php';
    require_once 'dao.inc.php';

    class NaturePieceDAO extends DAO{


    	private $_NTPCid = "NTPCID as NTPCID";
        private $_NTPCintitule = "NTPCINTITULE as NTPCINTITULE";


        //-------------------------------------------------------------------------------------------------------------
        //Pour avoir toutes les natures de pièce dans la BDD
        //-------------------------------------------------------------------------------------------------------------
        function getNaturePiece()
        {   
            $req = $this->prepare("
                                    SELECT NTPCID,NTPCINTITULE
                                    FROM NATURE_PIECE
                                    ORDER BY NTPCID
                                ");       
            $req->execute();
            return $this->cursorToObjectArray($req);
        }  

        //-------------------------------------------------------------------------------------------------------------
        // Insertion d'une nature de pièce dans la BDD

        function insertNaturePiece($intitule)
        {
        	$boo=false;
        	$req=$this->prepare("INSERT INTO NATURE_PIECE (NTPCINTITULE)VALUES(:intitule)");
        	$req->bindparam(':intitule',$intitule,PDO::PARAM_STR);
        	if($req->execute())
            {
                $boo=true;
            }
            return $boo;
        }

        //Insertion nature piece/formation dans COMPOSER

        function insertNaturePieceFormation($idnaturepiece, $idformation)
        {
            $boo=false;
            $req=$this->prepare("
                                    INSERT INTO COMPOSER
                                    VALUES (:idformation,:idnaturepiece)
                                ");
            $req->bindparam(':idnaturepiece',$idnaturepiece,PDO::PARAM_INT);
            $req->bindparam(':idformation',$idformation,PDO::PARAM_INT);
            if($req->execute())
            {
                $boo=true;
            }
            return $boo;
        }

        //--------------------------------------------------------------------------------------------------------------

        //-------------------------------------------------------------------------------------------------------------
        // Modification d'une nature de pièce dans la BDD
        //-------------------------------------------------------------------------------------------------------------
        function updateNaturePiece($id, $intitule)
        {
            $boo = false;
            $req= $this->prepare("UPDATE NATURE_PIECE set NTPCID= ':id' ,NTPCINTITULE = ':intitule' where NTPCid = ':id'");
            $req->bindParam(":id", $id, PDO::PARAM_INT);
            $req->bindParam(":intitule", $intitule, PDO::PARAM_STR);
            if($this->execute($req))
            {
                $boo = true;
            }
            return $boo;
        }

        //-------------------------------------------------------------------------------------------------------------
        // Suppression d'une nature de pièce dans la BDD
        //-------------------------------------------------------------------------------------------------------------
        function deleteNaturePiece($id)
        {
            $boo=false;
            $req=$this->prepare("DELETE FROM NATURE_PIECE WHERE NTPCID= :id ");
            $req->bindParam(':id',$id,PDO::PARAM_INT);

            if($req->execute())
            {
                $boo=true;
            }
            return $boo;
        }

        // suppression nature piece/formation dans COMPOSER

        function deleteNaturePieceFormation($idnaturepiece)
        {
            $boo=false;
            $req=$this->prepare("DELETE FROM COMPOSER WHERE NTPCID= :idnaturepiece");
            $req->bindparam(':idnaturepiece',$idnaturepiece,PDO::PARAM_INT);
            if($req->execute())
            {
                $boo=true;
            }
            return $boo;
        }

        // suppression nature piece/formation dans COMPOSER

        function searchNaturePieceById($idnaturepiece)
        {
            $boo=false;
            $req=$this->prepare("
                                    SELECT NTPCINTITULE
                                    FROM nature_piece
                                    WHERE NTPCID = :idnaturepiece
                                ");
            $req->bindparam(':idnaturepiece',$idnaturepiece,PDO::PARAM_INT);
            $req->execute();
            return $this->cursorToObjectArray($req);
        }
    }

?>