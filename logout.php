<?php
    session_start();
    unset($_SESSION["username"]);
    unset($_SESSION['message']);
    setcookie("PHPSESSID","",time()-1000,"/");
    header("location:index.php");
?>