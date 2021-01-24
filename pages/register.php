
<?php
include_once('./models/UsersModel.php');
include_once('./controllers/RanknBonusController.php');


    if(isset($_POST['name'])){
    $name = $_POST['name'];
    }
    if(isset($_POST['username'])){
    $username = $_POST['username'];
    }
    if(isset($_POST['sponsorid'])){
    $sponsor = $_POST['sponsorid'];
    }
    if(isset($_POST['phone'])){
        $phone = $_POST['phone'];
    }
    if(isset($_POST['accountnumber'])){
        $bankaccount = $_POST['accountnumber'];
    }
    if(isset($_POST['password'])){
    $password = $_POST['password'];
    }
    if(!empty($username)&&!empty($password)&&!empty($name)){
        
        $hashedpassword = password_hash( $password, PASSWORD_BCRYPT );
        $play = new UsersModel();
        $ancestors = "";
        $descendants = "";
        $bronzevalue = 0;
        $rank = "none";
        if($play->addUser($username,$name,$hashedpassword,$sponsor,$ancestors,$descendants,$bronzevalue,$rank, $phone, $bankaccount)==TRUE){
            if(!empty($sponsor)){
                
                $payer = new RanknBonusController();
                $payer->payregistration($sponsor, 2000, $name.'\'s Registration');
            }
            header('location: login');
        }else{
            $error = " Something went wrong, could not create user";
        }
    }else{
        //$error = " Fill all details";
    }
    $error = isset($_GET['error']) ? $_GET['error'] : null;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - Root & herbs</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image" style="background-image: url(&quot;assets/img/dogs/image2.jpeg&quot;);"></div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Create an Account!</h4>
                            </div>
                            <form class="user" method="POST" action="">
                                <div class="form-group"><input class="form-control form-control-user" type="text" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Full Name" name="name" required></div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" placeholder="Username" id = "username" onmouseout="disableRegister()" onblur= "checkusername()"  name="username" required></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="text" placeholder="Sponsor ID" name="sponsorid"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" placeholder="Phone number" name="phone" required></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="text" placeholder="Account Number" name="accountnumber" required></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="password" id="password" placeholder="Password" name="password" onkeyup="checkpassword();" required></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="password" id="re-password" placeholder="Repeat Password" name="password_repeat" onkeyup="checkpassword();" required></div>
                                </div><button id="submit-btn" onmouseover="disableRegister()" class="btn btn-primary btn-block text-white btn-user" type="submit" disabled>Register Account</button>
                                <hr>
                            </form>
                            <div class="col-sm-6 mb-3 mb-sm-0" style="display: contents;"><p> <span  id="txtHint"></span></p><p class="text-center" id="password-reply"></p></div>
                            <?php
                                    if(!empty($error)){
                                    echo '<div id="error" class="text-center" style="color:red">'.$error.'</div>';
                                    }
                                   ?>
                            <div class="text-center"><a class="small" href="forgot-password">Forgot Password?</a></div>
                            <div class="text-center"><a class="small" href="registeradmin">Not an regular user? Create an Admin Account.</a></div>
                            <div class="text-center"><a class="small" href="login">Already have an account? Login!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        function checkusername() {
            let username = document.getElementById('username').value;
            var xhttp;
            if (username.length == 0) { 
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
                disableRegister();
                }

            };
            xhttp.open("GET", "getname?username="+username, true);
            xhttp.send();   
        }
        function disableRegister(){
            let error = document.getElementById('error');
            if (error) {
                let button = document.getElementById('submit-btn');
                if (error.style.color == 'red') {
                    button.disabled = true;
                } else if (error.style.color == 'green') {
                    button.removeAttribute('disabled');
                }
            }
        }
        function checkpassword() {
            let pass = document.getElementById('password').value;
            let repass = document.getElementById('re-password').value;
            let reply = document.getElementById('password-reply');
            let button = document.getElementById('submit-btn');
            if (pass.length < 6 ) {
                reply.innerHTML = 'password is too short';
                reply.style.color = 'red';
            } else if (pass === repass & pass != '' ) {
                reply.innerHTML = 'password match';   
                reply.style.color = 'green'; 
                button.removeAttribute('disabled');            
            } else {
                reply.innerHTML = 'password does not match';
                reply.style.color = 'red';
            }
        }
    </script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>