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

if ($_POST['sponsorid'] == '') {
    $sponsor = 0;
    $parent = 0;
} else {
    $sponsor = $_POST['sponsorid'];
    $parent = null;
}

print_r($_POST);

$register = $userModel->addUser($username, $name, $password, $sponsor, $parent, $phone, $bankaccount);
//$userModel->addUser($username,$name,$hashedpassword,$sponsor,$ancestors,$descendants,$bronzevalue,$rank, $phone, $bankaccount)

if($register){

    header('location: ../login');
}else{
    header('location: ../register?error=Something went wrong, could not create user');
}
