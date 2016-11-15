<?php
    function checkLoggedInUser() { 
        if(isset($_SESSION['userName'])){
            return true;
        }else{
            return false;
        }
    }
    function incrementByFive($num){
        $newNum = $num + 5;
        return $newNum;
    } 
?>