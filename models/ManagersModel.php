<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('./scripts/config.scr.php');

class ManagersModel {

    function addManager($username,$name,$password,$role,$description){
        global $conn;
        
        $sql_putTransactions =  "INSERT INTO `managers`( `username`, `name`, `password`, `role`, `description`) VALUES (?,?,?,?,?)";

        $statement_putTransactions = $conn->prepare($sql_putTransactions);
        echo $conn->error;
        $statement_putTransactions->bind_param("sssis",$username,$name,$password,$role,$description);
        if($statement_putTransactions->execute()==TRUE){
           
            return TRUE;
        }else{
            return FALSE;
        }
        $statement_putTransactions->free_result();
        $statement_putTransactions->close();
        
       
        $conn->close();
    }
    function getManagerbyID ($username){
        global $conn;
        $sql_putTransactions = "SELECT * FROM `managers` WHERE `username`=?";
        $statement_putTransactions = $conn->prepare($sql_putTransactions);
        $statement_putTransactions->bind_param("s",$username);
        echo $conn->error;
        $statement_putTransactions->execute();
        $allTransactions = $statement_putTransactions->get_result();
    
        return $allTransactions;
        
        $statement_putTransactions->close();
        $conn->close();
    }
    function getAllManagers (){
        global $conn;
        $sql_getTransactions = "SELECT * FROM `managers`";
        $statement_getTransactions = $conn->prepare($sql_getTransactions);
        $statement_getTransactions->execute();
        $allTransactions = $statement_getTransactions->get_result();
    
        return $allTransactions;
        
        $statement_getTransactions->close();
        $conn->close();
    }
    function getSomeManagers ($page_first_result,$results_per_page){
        global $conn;
        $sql_getTransactions = "SELECT * FROM managers ORDER BY id DESC LIMIT  ?, ?";
        $statement_getTransactions = $conn->prepare($sql_getTransactions);
        $statement_getTransactions->bind_param("ii",$page_first_result,$results_per_page);
        $statement_getTransactions->execute();
        $allTransactions = $statement_getTransactions->get_result();
    
        return $allTransactions;
        
        $statement_getTransactions->close();
        $conn->close();
    }
    function updateManagerbyID ($id,$username,$name,$password,$role,$description){
        global $conn;
        $sql_putTransactions =
        "UPDATE `managers` SET `username`=?,`name`=?,`password`=?,`role`=?,`description`=? WHERE `id` = '?'";
        $statement_putTransactions = $conn->prepare($sql_putTransactions);
        echo $conn->error;
        $statement_putTransactions->bind_param("sssis",$username,$name,$password,$role,$description,$id);
        $statement_putTransactions->execute();
        if($statement_putTransactions->execute()==TRUE){
           
            echo "TRUE";
        }else{
            echo "FALSE";
        }
        
        $statement_putTransactions->close();
        $conn->close();
    }

    function updateRolebyID($id,$role){
        global $conn;
        $sql_putTransactions = "UPDATE `managers` SET `role`= ? WHERE `id` = ?";
        $statement_putTransactions = $conn->prepare($sql_putTransactions);
        
        $statement_putTransactions->bind_param("ii", $role,$id);
        echo $conn->error;
        $statement_putTransactions->execute();
        echo $conn->error;
        if($statement_putTransactions->execute()==TRUE){
           
            return TRUE;
        }else{
            return FALSE;
        }
        
        $statement_putTransactions->close();
        $conn->close();
    }

    function deleteManagerbyID ($id){
        global $conn;
        $sql_putTransactions = "DELETE FROM `managers` WHERE `id` = '?'";
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
