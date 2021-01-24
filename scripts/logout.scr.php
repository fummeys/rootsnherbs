<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["name"]);
unset($_SESSION["user"]);
unset($_SESSION["level"]);
header("Location: ../login");
?>