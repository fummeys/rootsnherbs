<?php
include_once('header.php');
if(!isset($_SESSION["user"])){
    header('location: login');
}
?>
        <h1 style="text-align:center;color:magenta">Permission Denied</h1>
<?php
include_once('footer.php');
?>