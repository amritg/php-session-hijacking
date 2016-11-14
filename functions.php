<?php
    function checkLoggedInUser() { 
        if(isset($_SESSION['userName'])){
            return true;
        }else{
            return false;
        }
    } 
?>