<?php

include_once('../models/UsersModel.php');
include_once('../models/ManagersModel.php');


include_once('./config.scr.php');
/*
waiting admin -level 1
user -  level 2
confirmed admin - 3
SuperAdmin - 4

*/

$userModel = new UsersModel;

$username = $_POST['username'];

$password = $_POST['password'];

$user_verify = $userModel->getUserbyID($username);

if ($user_verify->num_rows > 0) {
    $user_details = $user_verify->fetch_assoc();
    // print_r($user_details['password']);
    $password_check = password_verify($password, $user_details['password']);
    if ($password_check) {
        session_start();
        $_SESSION['user'] = $user_details['name'];
        $_SESSION["id"] = $user_details['id'];
        $_SESSION["level"] = 1;
        header('location: ../profile');
    }else{

        header('location: ../login?error=password incorrect');
    }
} else {
    $play2 = new ManagersModel();
    $user = $play2->getManagerbyID($username);
    $thisuser = $user->fetch_assoc();
    if($user->num_rows>0 && password_verify($password,$thisuser['password'])){
        session_start();

        $_SESSION["user"] = $thisuser['name'];
        $_SESSION["id"] = $thisuser['id'];
        $_SESSION["level"] = $thisuser['role'];
        if($_SESSION["level"]<4){
            header('location: ../users');
        }else{
        header('location: ../dashboard');
        }
    }else{
    header('location: ../login?error=Please enter a valid Username and password');
    }
}

