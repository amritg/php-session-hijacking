<?php
    require("config.php");

    if(isset($_POST["logIn"]) && !empty($_POST["logIn"])){
        if(!empty($_POST["userName"] && $_POST["password"])){
            $logUser = $_POST["userName"];
            $logPassword = $_POST["password"];

            $checkLogIn = "SELECT * FROM users WHERE name='$logUser' AND password='$logPassword'";

            $logValues = mysqli_query($conn,$checkLogIn);
            $row = mysqli_fetch_array($logValues, MYSQLI_ASSOC);

            $logName = $row["name"];
            if($row){
                require("preActivateSessions_2.php");
                /* ****** Incrementing Session Cookie ID fetched from Database ***** */
                $getSessionQuery = "SELECT * FROM sessionId";
                $sessionArray = mysqli_query($conn,$getSessionQuery);
                $session = mysqli_fetch_array($sessionArray, MYSQLI_ASSOC);

                $sessionNumber = $session['sessionNumber'];
                $sessionId = $session['id'];
                $newSessionNumber = $session['sessionNumber'] + 5;

                $updateSessionQuery = "UPDATE sessionId SET sessionNumber='$newSessionNumber' WHERE id='$sessionId'";
                mysqli_query($conn,$updateSessionQuery);

                $sessionId = session_id($sessionNumber);
                
                session_start();

                $_SESSION['userName']=$logName;
                header("Location:welcome.php");
            }else{
                session_start();
                $message = "LOG IN ERROR<br>User not found. Type Username password correctly OR Register Yourself First.";
                $_SESSION['message'] = $message;

                header("Location:index.php");
            }
        }else{
            session_start();
            $message = "LOG IN ERROR<br>Please provide both Username and Password.";
            $_SESSION['message'] = $message;
            header("Location:index.php");
        }
        mysqli_close($conn);
    }

?>