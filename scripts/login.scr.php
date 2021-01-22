<?php

include_once('../models/UsersModel.php');

include_once('./config.scr.php');


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
        $_SESSION['user'] = $user_details['id'];
        header('location: ../profile');
    } else {
        header('location: ../login?error=password incorrect');
    }
    
    
} else {
    header('location: ../login?error=Please enter a valid Username and password');
}

