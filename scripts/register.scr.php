<?php

include_once('../models/UsersModel.php');
include_once('./config.scr.php');


$userModel = new UsersModel;

$name = $_POST['name'];
$username = $_POST['username'];
// $sponsor = isset($_POST['sponsorid']) ? $_POST['sponsorid'] : null;
$phone = $_POST['phone'];
$bankaccount = $_POST['accountnumber'];
$password = $_POST['password'];
$parent = null;
if ($_POST['sponsorid'] == '') {
    $sponsor = null;
} else {
    $sponsor = $_POST['sponsorid'];
}

print_r($_POST);

$register = $userModel->addUser($username, $name, $password, $sponsor, $parent, $phone, $bankaccount);


if($register){

    header('location: ../login');
}else{
    header('location: ../register?error=Something went wrong, could not create user');
}
