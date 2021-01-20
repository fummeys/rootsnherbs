<?php
session_start();
?>
<!DOCTYPE html>
<?php
include_once('./models/TransactionsModel.php');
include_once('./models/UsersModel.php');
include_once('./models/ManagersModel.php');

/*

$play = new TransactionsModel();
$id = 1;
$name = 'Haliru';
$issuer = 1;
$oldbv = 100;
$thisbv = 100;
$newbv = 200;
$description ='This just a test';
$userid = 1;
$play->recordTransaction ($id,$name,$issuer,$oldbv,$thisbv,$newbv,$description,$userid);
$play1 = new UsersModel();
$username = "hallykola";
$password = "hally123";
$hashedpassword = password_hash( $password, PASSWORD_BCRYPT );
$sponsor = "";
$ancestors =  "";
$descendants = "";
$bronzevalue = 320;
$rank = "ruby";
$phone = "35342422";
$role = 1;
$bankaccount = 2343423535;
$play2 = new ManagersModel();

//$play2->addManager($username,$name,$password,$role,$description);
//$play1->addUser($username,$name,$hashedpassword,$sponsor,$ancestors,$descendants,$bronzevalue,$rank, $phone, $bankaccount);
*/

if(isset($_POST['username'])){
$username = $_POST['username'];
}
if(isset($_POST['password'])){
$password = $_POST['password'];
}
if(!empty($username)&&!empty($password)){
    
    $hashedpassword = password_hash( $password, PASSWORD_BCRYPT );
    $play2 = new ManagersModel();
    $user = $play2->getManagerbyID($username);
    $thisuser = $user->fetch_assoc();
    if($user->num_rows>0 && password_verify($password,$thisuser['password'])){
        session_start();

        $_SESSION["user"] = $thisuser['name'];
        $_SESSION["id"] = $thisuser['id'];
        header('location: dashboard.php');
    }else{
        $play1 = new UsersModel();
        $user = $play1->getUserbyID($username);
        $thisuser = $user->fetch_assoc();
        if($user->num_rows>0 && password_verify($password,$thisuser['password'])){
            session_start();

            $_SESSION["user"] = $thisuser['name'];
            $_SESSION["id"] = $thisuser['id'];
            //echo $_SESSION["user"]->fetch_assoc()['name'];
            header('location: profile.php');
        }else{
        $error = "Please enter a valid Username and password ";
        }
    }
    //header('location: dashboard.php');
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Roots & Herbs</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/dogs/image3.jpeg&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome Back!</h4>
                                    </div>
                                    <form class="user" method = "POST">
                                        <div class="form-group"><input class="form-control form-control-user" type="name" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter your Username..." name="username"></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password"></div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1"><label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label></div>
                                            </div>
                                        </div><button class="btn btn-primary btn-block text-white btn-user" type="submit">Login</button>
                                        <hr>
                                    </form>
                                    <?php
                                    if(!empty($error)){
                                    echo '<div class="text-center" style="color:red">'.$error.'</div>';
                                    }
                                   ?>

                                    <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
                                    <div class="text-center"><a class="small" href="register.php">Create an Account!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>