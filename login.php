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
                $message = "Logged In Successfully.";
                //$sessionId = session_id(base64_encode($logName));
                $sessionId = session_id(bin2hex($logName));
                
                session_start();

                $_SESSION['message'] = $message;

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