<?php
include_once('./models/UsersModel.php');
include_once('./models/ManagersModel.php');



if(isset($_GET['username'])){
    $checkname  = $_REQUEST['username'];
    $usermodel = new UsersModel();
    $result = $usermodel->getUserbyID($checkname);
    $managersmodel = new ManagersModel();
    $result1 = $managersmodel->getManagerbyID($checkname);
    if ($result->num_rows>0||$result1->num_rows>0){
        echo "<p class='text-center' style='color:red'> Username ". $checkname . " is already taken </p>";
    }else{
        echo "<p class='text-center' style='color:green'> Username ". $checkname . " is free for use </p> ";

    }

}

?>