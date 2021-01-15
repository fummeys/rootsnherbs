<?php

class ControllerUser {
    function getAllusers (){
        global $conn;
        $sql_getUsers = "SELECT * FROM `user`";
        $statement_getUsers = $conn->prepare($sql_getUsers);
        $statement_getUsers->execute();
        $allUsers = $statement_getUsers->get_result();
    
        return $allUsers;
        
        $statement_getUsers->close();
        $conn->close();
    }
}

