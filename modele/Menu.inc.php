<?php

class Menu
{
    private $_name;
    private $_lesLiens = array();
    private $_IndexLien = array();
          
    public function setName($n)
    {
        $this->_name = $n;
    }

    public function ajouterLien($legende,$direction)
    {
        $this->_lesLiens[] = "<li><a href='index.php?m=".$direction."'>".$legende."</a></li>";
        $this->_IndexLien[] = $direction;
    }

    public function supprimeLien($lien)
    {
        $cpt=0;
        $renvoie=0;
        foreach ($this->_IndexLien as $indlien)
        {
            if($indlien == $lien)
            {
                $renvoie = $cpt;
            }
            else
            {
                $cpt+=1;
            }
        }
        unset($this->_lesLiens[$renvoie]);    
    }

    public function afficheMenu()
    {
        $m="<div id='".  $this->_name."'>";
        $m .= "<ul>";
        
        foreach ($this->_lesLiens as $lien)
        {
            $m.=$lien;
        }
        
        $m.= "</ul>";
        $m.= "</div>";
        echo $m;
    }
}

?>