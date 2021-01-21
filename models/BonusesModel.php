<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('./scripts/config.scr.php');

class BonusesModel {

    function addBonus($name,$userid,$bonusvalue,$transactionid,$description,$bonustype){
        global $conn;
        
        $sql_putTransactions = "INSERT INTO `bonuses`(`name`, `userid`,`bonusvalue`, `transactionid`, `description`, `bonustype`) VALUES (?,?,?,?,?,?)";

        $statement_putTransactions = $conn->prepare($sql_putTransactions);
        echo $conn->error;
        $statement_putTransactions->bind_param("siiiss",$name,$userid,$bonusvalue,$transactionid,$description,$bonustype);
        echo $conn->error;
        if($statement_putTransactions->execute()==TRUE){
            echo $conn->error;
            return TRUE;
        }else{
            return FALSE;
            echo $conn->error;
        }
        $statement_putTransactions->free_result();
        $statement_putTransactions->close();
        
       
        $conn->close();
    }
    function getBonusbyID ($id){
        global $conn;
        $sql_putTransactions = "SELECT * FROM `bonuses` WHERE `userid` = ? ";
        $statement_putTransactions = $conn->prepare($sql_putTransactions);
        $statement_putTransactions->bind_param("i",$id);
        echo $conn->error;
        $statement_putTransactions->execute();
        $allTransactions = $statement_putTransactions->get_result();
    
        return $allTransactions;
        
        $statement_putTransactions->close();
        $conn->close();
    }
    function getAllBonuses (){
        global $conn;
        $sql_getTransactions = "SELECT * FROM `bonuses`";
        $statement_getTransactions = $conn->prepare($sql_getTransactions);
        $statement_getTransactions->execute();
        $allTransactions = $statement_getTransactions->get_result();
    
        return $allTransactions;
        
        $statement_getTransactions->close();
        $conn->close();
    }
    function getSomeBonusesbyID ($id,$page_first_result,$results_per_page){
        global $conn;
        $sql_getTransactions = "SELECT * FROM bonuses WHERE `userid` = ? ORDER BY id DESC LIMIT  ?, ?";
        $statement_getTransactions = $conn->prepare($sql_getTransactions);
        $statement_getTransactions->bind_param("iii",$id,$page_first_result,$results_per_page);
        $statement_getTransactions->execute();
        $allTransactions = $statement_getTransactions->get_result();
    
        return $allTransactions;
        
        $statement_getTransactions->close();
        $conn->close();
    }
    function getSomeBonuses ($page_first_result,$results_per_page){
        global $conn;
        $sql_getTransactions = "SELECT * FROM bonuses ORDER BY id DESC LIMIT  ?, ?";
        $statement_getTransactions = $conn->prepare($sql_getTransactions);
        $statement_getTransactions->bind_param("ii",$page_first_result,$results_per_page);
        $statement_getTransactions->execute();
        $allTransactions = $statement_getTransactions->get_result();
    
        return $allTransactions;
        
        $statement_getTransactions->close();
        $conn->close();
    }
    
    

    function deleteProductbyID ($id){
        global $conn;
        $sql_putTransactions = "DELETE FROM `products` WHERE `id` = '?'";
        $statement_putTransactions = $conn->prepare($sql_putTransactions);
        $statement_putTransactions->bind_param("i",$id);
        $statement_putTransactions->execute();
        if($statement_putTransactions->execute()==TRUE){
           echo "TRUE";
       }else{
           echo "FALSE";
       }
        $statement_putTransactions->close();
        $conn->close();
    }
}
