<?php
    session_start();
    require ("functions.php");
    if(!checkLoggedInUser()){
        header("Location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome!</title>
</head>
<body>
    <?php
        if(isset($_SESSION['userName'])){
            echo "Hi ".$_SESSION['userName']."<br>";
            echo session_id();
        }
    ?>
    
</body>
</html>