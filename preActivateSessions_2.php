<?php 
    require("config.php");

    // Users whose session will start automatically
    $preActivateSessionUsers = ["amritg","admin","a"];

    for($i = 0; $i < (count($preActivateSessionUsers)); $i++){
        if(checkStoredSession($preActivateSessionUsers[$i]) == false){
            $sessionQuery = mysqli_query($conn,"SELECT * FROM sessionId");
            $session = mysqli_fetch_array($sessionQuery, MYSQLI_ASSOC);
            $sessionId = $session['id'];
            
            $sessionNumber = $session['sessionNumber'];
            echo "Session Number is: $sessionNumber"."<br>";
            $newSessionNumber = $session['sessionNumber'] + 5;
            $updateSessionQuery = "UPDATE sessionId SET sessionNumber='$newSessionNumber' WHERE id='$sessionId'";
            mysqli_query($conn,$updateSessionQuery);
            
            session_id($sessionNumber);
            echo "Session id is:". session_id() . "<br>";
            session_start();
            $_SESSION['userName'] = $preActivateSessionUsers[$i];
            echo "User Created: ".$_SESSION['userName'] . "<br>";
            session_write_close();
        }
    } 

    // Checks if the session has started or not for Users where $sessionVariable(userName) is to be set automatically!! 
    function checkStoredSession($sessionVariable){
        echo "$sessionVariable<br>";
        $allStoredSession = scandir(session_save_path());
        print_r($allStoredSession);
        echo "<br>";
        for($j = 0; $j < (count($allStoredSession)); $j++){
            $pSession = intval(substr($allStoredSession[$j],5));
            echo "pSession is : $pSession";
            session_id($pSession);
            session_start();
            if(!empty($_SESSION['userName'])){
                $userName = $_SESSION['userName'];
                session_write_close();
                if($userName == $sessionVariable){
                    echo $sessionVariable ." is present in the current session.<br>";
                    return true;
                }else{
                    echo $sessionVariable." is absent in this session.<br>";
                }
            }else{
                echo " No userName session Variable.<br>";
            }
            session_write_close();
        }
        return false;
    }
?>