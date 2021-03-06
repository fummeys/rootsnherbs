<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// include_once('scripts/config.scr.php');

class UsersModel {

    function addUser ($username,$name,$password,$sponsor,$parent, $phone, $bankaccount){
        global $conn;
        $sql_getTransactions = "SELECT * FROM `users` WHERE `username` = ?";
        $statement_getTransactions = $conn->prepare($sql_getTransactions);
        $statement_getTransactions->bind_param("s", $username);
        $statement_getTransactions->execute();
        $results = $statement_getTransactions->get_result();

        if ($results->num_rows > 0) {
            return FALSE;
        } else {
            $sql_putTransactions =  "INSERT INTO `users`(`username`, `name`, `password`, `sponsor`, `parent`, `phone`, `bankaccount`) VALUES (?,?,?,?,?,?,?)";

            $statement_putTransactions = $conn->prepare($sql_putTransactions);
            echo $conn->error;
            $statement_putTransactions->bind_param("sssiiss",$username,$name,$password,$sponsor,$parent, $phone, $bankaccount);
            if($statement_putTransactions->execute()==TRUE){
            
                return TRUE;
            }else{
                return FALSE;
            }
            $statement_putTransactions->free_result();
            $statement_putTransactions->close();
        }
        

       
        $conn->close();
    }


    function getAllUsers (){
        global $conn;
        $sql_getTransactions = "SELECT * FROM `users`";
        $statement_getTransactions = $conn->prepare($sql_getTransactions);
        $statement_getTransactions->execute();
        $allTransactions = $statement_getTransactions->get_result();
    
        return $allTransactions;
        
        $statement_getTransactions->close();
        $conn->close();
    }
    function getSomeUsers ($page_first_result,$results_per_page){
        global $conn;
        $sql_getTransactions = "SELECT * FROM users ORDER BY id DESC LIMIT  ?, ?";
        $statement_getTransactions = $conn->prepare($sql_getTransactions);
        $statement_getTransactions->bind_param("ii",$page_first_result,$results_per_page);
        $statement_getTransactions->execute();
        $allTransactions = $statement_getTransactions->get_result();
    
        return $allTransactions;
        
        $statement_getTransactions->close();
        $conn->close();
    }
    function getUserbyID ($username){
        global $conn;
        $sql_putTransactions = "SELECT * FROM `users` WHERE `username`=? ";
        $statement_putTransactions = $conn->prepare($sql_putTransactions);
        $statement_putTransactions->bind_param("s",$username);
        $statement_putTransactions->execute();
        $allTransactions = $statement_putTransactions->get_result();
    
        return $allTransactions;
        
        $statement_putTransactions->close();
        $conn->close();
    }
    function getUserbyrealID ($id){
        global $conn;
        $sql_putTransactions = "SELECT * FROM `users` WHERE `id`=? ";
        $statement_putTransactions = $conn->prepare($sql_putTransactions);
        $statement_putTransactions->bind_param("s",$id);
        $statement_putTransactions->execute();
        $allTransactions = $statement_putTransactions->get_result();
    
        return $allTransactions;
        
        $statement_putTransactions->close();
        $conn->close();
    }


    function updateUserbyID ($id,$username,$name,$password,$sponsor,$ancestors,$descendants,$bronzevalue,$rank, $phone, $bankaccount){
        global $conn;
        $sql_putTransactions =
        "UPDATE `users` SET `username`=?,`name`=?,`password`=?,`parent`=?,`ancestors`=?,`descendants`=?,`bronzevalue`=?,`rank`=?,`phone`=?,`bankaccount`=?,`dateregistered`=?  WHERE `id` = '?'";
        $statement_putTransactions = $conn->prepare($sql_putTransactions);
        echo $conn->error;
        $statement_putTransactions->bind_param("sssisisssi",$username,$name,$password,$sponsor,$ancestors,$descendants,$bronzevalue,$rank, $phone, $bankaccount);
        $statement_putTransactions->execute();
        if($statement_putTransactions->execute()==TRUE){
           
            echo "TRUE";
        }else{
            echo "FALSE";
        }
        
        $statement_putTransactions->close();
        $conn->close();
    }

    // this function updateUserItembyID() will not work needs fix
    function updateUserItembyID ($title,$type,$data,$id){
        global $conn;
        $sql_putTransactions =
        "UPDATE `users` SET `" . $title . "` =? WHERE `id` = ?";
        $statement_putTransactions = $conn->prepare($sql_putTransactions);
        echo $conn->error;
        $statement_putTransactions->bind_param($type,$data, $id);
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
   
    function deleteUserbyID ($id){
        global $conn;
        $sql_putTransactions = "DELETE FROM `users` WHERE `id` = ''";
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

