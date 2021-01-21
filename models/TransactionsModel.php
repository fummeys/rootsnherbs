<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('./scripts/config.scr.php');

class TransactionsModel {

    function recordTransaction ($name,$issuer,$oldbv,$thisbv,$newbv,$description,$userid){
        global $conn;
        
        $sql_putTransactions =  "INSERT INTO `transactions`(`name`, `issuer`, `oldbv`, `thisbv`, `newbv`, `description`, `userid`) VALUES (?,?,?,?,?,?,?)";

        // "INSERT INTO `transactions`(`name`, `issuer`, `oldbv`, `thisbv`, `newbv`, `description`, `userid`) VALUES (`".$name."`, `".$issuer."`, `".$oldbv."`, `".$thisbv. "`, `".$newbv."`, `".$description."`,". $userid."`)";
        $statement_putTransactions = $conn->prepare($sql_putTransactions);
        echo $conn->error;
        $statement_putTransactions->bind_param("siiiisi", $name,$issuer,$oldbv,$thisbv,$newbv,$description,$userid);
        if($statement_putTransactions->execute()==TRUE){
            $sql_putTransactions =  "SELECT LAST_INSERT_ID()";
            $statement_putTransactions = $conn->prepare($sql_putTransactions);
            $statement_putTransactions->execute();
            $allTransactions = $statement_putTransactions->get_result();
            return $allTransactions;

        }else{
            return FALSE;
            echo $conn->error;
        }
        $statement_putTransactions->free_result();
        $statement_putTransactions->close();
       
        $conn->close();
    }
    function getSomeTransactions ($page_first_result,$results_per_page){
        global $conn;
        $sql_getTransactions = "SELECT * FROM transactions LIMIT  ?, ?";
        $statement_getTransactions = $conn->prepare($sql_getTransactions);
        $statement_getTransactions->bind_param("ii",$page_first_result,$results_per_page);
        $statement_getTransactions->execute();
        $allTransactions = $statement_getTransactions->get_result();
    
        return $allTransactions;
        
        $statement_getTransactions->close();
        $conn->close();
    }
    function getAllTransactions (){
        global $conn;
        $sql_getTransactions = "SELECT * FROM `transactions`";
        $statement_getTransactions = $conn->prepare($sql_getTransactions);
        $statement_getTransactions->execute();
        $allTransactions = $statement_getTransactions->get_result();
    
        return $allTransactions;
        
        $statement_getTransactions->close();
        $conn->close();
    }
    

    function getAllTransactionsbyUserID ($id){
        global $conn;
        $sql_getTransactions = "SELECT * FROM `transactions` WHERE `userid` = ". $id;
        $statement_getTransactions = $conn->prepare($sql_getTransactions);
        $statement_getTransactions->execute();
        $allTransactions = $statement_getTransactions->get_result();
        
        return $allTransactions;
        
        $statement_getTransactions->close();
        $conn->close();
    }

    function getAllTransactionbyID ($id){
        global $conn;
        $sql_getTransactions = "SELECT * FROM `transactions` WHERE `id` = ". $id;
        $statement_getTransactions = $conn->prepare($sql_getTransactions);
        $statement_getTransactions->execute();
        $allTransactions = $statement_getTransactions->get_result();
    
        return $allTransactions;
        
        $statement_getTransactions->close();
        $conn->close();
    }
}

