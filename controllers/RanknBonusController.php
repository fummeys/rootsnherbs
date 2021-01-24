<?php
include_once('./models/TransactionsModel.php');
include_once('./models/UsersModel.php');
include_once('./models/BonusesModel.php');
include_once('./models/RanksModel.php');
require 'vendor/autoload.php';

class RanknBonusController{

    function rankin($myrank,$ranks){
        $x = 0;
        foreach($ranks as $item){
            /*foreach($item as $itema){
                if($myrank == $itema){
                    $x += 1;
                }
            }*/
           if(in_array($myrank, $item)){
               $x += 1;
           }
        }
        return $x;
    }
    function totalbv($mybv){
        $y = 0;
        foreach($bv as $itemb){
            $y += $itemb;
        }
        return $y;

    }
    function eachmorethan($mybv, $abv){
        $z = 0;
        foreach($mybv as $itemc){
            if($itemc>= $abv){
                $z +=1;
            }
        }
        return $z;
    }
    function grade($userid){
            $play1 = new UsersModel();
            $allusers = $play1->getAllUsers();
            $tree = new BlueM\Tree($allusers);
            $node = $tree->getNodeById($userid);
            $ancestors = $node->getAncestorsAndSelf();
            $chairmanid = $userid ;
            $chairmanbv = $node->get('bronzevalue');
            foreach ($ancestors as $item){
            $children = $item->getChildren();
            $childrencount = count($children);
            $bvbychild = array();
            $ranksbychild = array();
            foreach ($children as $item1){
                $mydesc = $item1->getDescendantsAndSelf();
                
                $bv = 0;
                foreach($mydesc as $item2){
                    $bv += $item2->get('bronzevalue');
                }
                $bvbychild [] = $bv; 
                
                $rank = array();
                foreach($mydesc as $item2){
                    $rank[] = $item2->get('rank');
                }
                $ranksbychild[] = $rank;
            }

        

    // grading logic

      $level = "none";
      if($chairmanbv>=100){
          $level = "BRONZE";
      }
      if($chairmanbv>=300){
          $level = "SAPPHIRE" ;
      }
      if(($childrencount>=4 && $this->eachmorethan($bvbychild, 300)>=4)||($childrencount>=3 && $this->eachmorethan($bvbychild, 500)>3)){
        $level = "RUBY" ;
    }

    if(($this->rankin("RUBY",$ranksbychild)>=4 && $this->totalbv($bvbychild)>=4800)||($this->rankin("RUBY",$ranksbychild)>=3 && $this->totalbv($bvbychild)>=9600)){
        $level = "SILVER" ;
    }
    if(($this->rankin("SILVER",$ranksbychild)>=4 && $this->totalbv($bvbychild)>=19200)||($this->rankin("SILVER",$ranksbychild)>=3 && $this->totalbv($bvbychild)>=38400)){
        $level = "DIAMOND" ;
    }
    if(($this->rankin("DIAMOND",$ranksbychild)>=4 && $this->totalbv($bvbychild)>=76000)){
        $level = "GOLD" ;
    }
    if(($this->rankin("GOLD",$ranksbychild)>=4 && $this->totalbv($bvbychild)>=307200)){
        $level = "GENERAL" ;
    }
    if(($this->rankin("GENERAL",$ranksbychild)>=3 && $this->totalbv($bvbychild)>=1200000)){
        $level = "ONE STAR GENERAL" ;
    }
    if(($this->rankin("ONE STAR GENERAL",$ranksbychild)>=3 && $this->totalbv($bvbychild)>=4900000)){
        $level = "TWO STAR GENERAL" ;
    }
    if(($this->rankin("TWO STAR GENERAL",$ranksbychild)>=3 && $this->totalbv($bvbychild)>=19000000)){
        $level = "THREE STAR GENERAL" ;
    }

    // save/update level in users table
    if(strtoupper($item->get('rank'))!=strtoupper($level)){ 
    $play1->updateUserItembyID ('rank','si',$level,$item->get('id'));
    $ranker = new RanksModel();
    $ranker->addRank($item->get('name'), $item->get('id') ,$item->get('rank') , $level);      
    }
            }

        }

        function pay($person, $amount, $description){
            $eligible4pension = array('SAPPHIRE','RUBY','SILVER','DIAMOND','GOLD','GENERAL','ONE STAR GENERAL','TWO STAR GENERAL','THREE STAR GENERAL');
            $bonusmaker = new BonusesModel();
            $transactionid = $transactionid->fetch_assoc()['LAST_INSERT_ID()'];
            $play1 = new UserModel();
            if(in_array($person->get('rank'),$eligible4pension)){
            $amount -= 0.07*$amount; 
            $penamount  = 0.05*$amount + (0.05*$amount* 0.2);
            $bonusmaker->addBonus($person->get('name'),$person->get('id'),$amount, $transactionid,$description,'Pension deducted');
            $bonusmaker->addBonus($person->get('name'),$person->get('id'),$penamount, $transactionid,$description,'Pension');
            
            $play1->updateUserItembyID ('bonusvalue','si',$person->get('bonusvalue')+$amount+$penamount,$person->get('id'));
            }else{
                $amount -= 0.02*$amount;
            $bonusmaker->addBonus($person->get('name'),$person->get('id'),$amount, $transactionid,$description,'Pension not deducted');
            $play1->updateUserItembyID ('bonusvalue','si',$person->get('bonusvalue')+$amount,$person->get('id'));
               
            }
        }

        function payregistration($sponsor, $amount, $description){
            $play1 = new UsersModel();
            $allusers = $play1->getAllUsers();
            $tree = new BlueM\Tree($allusers);
            $person = $tree->getNodeById($sponsor);
            $eligible4pension = array('SAPPHIRE','RUBY','SILVER','DIAMOND','GOLD','GENERAL','ONE STAR GENERAL','TWO STAR GENERAL','THREE STAR GENERAL');
            $bonusmaker = new BonusesModel();
            $transactionid = 12;
            if(in_array($person->get('rank'),$eligible4pension)){
            $amount -= 0.07*$amount; 
            $penamount  = 0.05*$amount + (0.05*$amount* 0.2);
            $bonusmaker->addBonus($person->get('name'),$person->get('id'),$amount, $transactionid,$description,'Pension deducted bonus');
            $bonusmaker->addBonus($person->get('name'),$person->get('id'),$penamount, $transactionid,$description,'Pension from registration bonus');
            $play1->updateUserItembyID ('bonusvalue','si',$person->get('bonusvalue')+$amount+$penamount,$person->get('id'));

            }else{
                $amount -= 0.02*$amount;
                
            if($bonusmaker->addBonus($person->get('name'),$sponsor,$amount, $transactionid,$description,'Not eligible for Pension')){
                $play1->updateUserItembyID ('bonusvalue','si',$person->get('bonusvalue')+$amount,$person->get('id'));
                // echo 'done';
            }else{
                //echo 'couldnt do it';
            }
                
            }
        }

        function paybonuses($userid,$thisbv){
            $play1 = new UsersModel();
            $allusers = $play1->getAllUsers();
            $tree = new BlueM\Tree($allusers);
            $node = $tree->getNodeById($userid);
            $ancestors = $node->getAncestors();
            $chairmanid = $userid ;
            $chairmanbv = $node->get('bronzevalue');
            $father = $node->getParent();
            $eligible4indirect = array('RUBY','SILVER','DIAMOND','GOLD','GENERAL','ONE STAR GENERAL','TWO STAR GENERAL','THREE STAR GENERAL');
            $eligible4direct = array('SAPPHIRE','RUBY','SILVER','DIAMOND','GOLD','GENERAL','ONE STAR GENERAL','TWO STAR GENERAL','THREE STAR GENERAL');

            
            //direct bonus
            if(in_array($father->get('rank'),$eligible4direct)){
            pay($father, 0.20*$thisbv);
            }
            //indirect bonus
            $x = 0;
            foreach ($ancestors as $item){
                if(in_array($item->get('rank'),$eligible4indirect)){
                switch ($x) {
                    case 0:
                        pay($item, 0.1*$thisbv);
                        break;
                    case 1:
                        pay($item, 0.08*$thisbv);
                         break;
                    case 2:
                        pay($item, 0.05*$thisbv);
                        break;
                    case 3:
                        pay($item, 0.03*$thisbv);
                        break;
                    case 4:
                        pay($item, 0.02*$thisbv);
                        break;
                    default:
                        break;
                    }
                }
                if($x>4){
                    break;
                }
               
            }

        } 
    }
    

?>