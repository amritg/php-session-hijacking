<?php 
    require("config.php");

    // Users whose session will start automatically
    $preActivateSessionUsers = ["amritg","admin","a"];

    for($i = 0;$i < (count($preActivateSessionUsers)); $i++){
        $sessionUser = "sess_" . bin2hex($preActivateSessionUsers[$i]); // Encode Users in hexcode
        if(!checkStoredSession($sessionUser)){
            $searchUser = mysqli_query($conn,"SELECT * FROM users where name = '$preActivateSessionUsers[$i]'");
            $rowUser = mysqli_fetch_array($searchUser, MYSQLI_ASSOC);
            if($rowUser){
                $userName = $rowUser["name"];
                session_id(bin2hex($userName));
                // echo session_id()+"<br>";
                session_start();
                $_SESSION['userName']= $userName;
                // echo "<pre>", print_r($_SESSION, 1), "</pre>";
                session_write_close();
            }
        }
    }
    // Checks if the session has started or not for Users who Session is to be activated automatically!! 
    function checkStoredSession($sessionId){
        $allStoredSession = scandir(session_save_path());
        for($j = 0; $j < (count($allStoredSession)); $j++){
            $pSession = $allStoredSession[$j];
            if($pSession == $sessionId){
                return true;
            }
        }
    }
?>