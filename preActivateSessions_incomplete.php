<?php 
    session_start();
    require("config.php");
    // Users whose session will start automatically
    $preActivateSessionUsers = ["amritg","admin","a"];
    $sessionArray = array();
    print_r($_SESSION);
    if(empty($_SESSION["userName"])){
        echo "Something is empty <br>";
        for($i = 0; $i < (count($preActivateSessionUsers)); $i++){
            $sessionQuery = mysqli_query($conn,"SELECT * FROM sessionId");
            $session = mysqli_fetch_array($sessionQuery, MYSQLI_ASSOC);
            
            $sessionId = $session['id'];
            $sessionNumber = $session['sessionNumber'];
            
            array_push($sessionArray,$sessionNumber);

            $newSessionNumber = $session['sessionNumber'] + 5;
            $updateSessionQuery = "UPDATE sessionId SET sessionNumber='$newSessionNumber' WHERE id='$sessionId'";
            mysqli_query($conn,$updateSessionQuery);
        }
        print_r($sessionArray);
        $asscoiativeSessions = array_combine($preActivateSessionUsers,$sessionArray);
        print_r($asscoiativeSessions);
        foreach($asscoiativeSessions as $key => $value){
            $sessionUser = "sess_" .$value;
            if(!checkStoredSession($sessionUser)){
                echo "key1".$key."<br>";
                session_id($value);
                session_start();
                $_SESSION['userName']= $key;
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