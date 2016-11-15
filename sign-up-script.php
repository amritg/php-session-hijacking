<?php  
	session_start();
	require("config.php");

	if(isset($_POST["register"]) && !empty($_POST["register"])){

		if(!empty($_POST["userName"] && $_POST["email"] && $_POST["password"])){
			$userName = addslashes($_POST["userName"]);
			$password = addslashes($_POST["password"]);
            $email = addslashes($_POST["email"]);
			
			$userCheck = "SELECT name FROM users WHERE name='$userName'";

			$result = mysqli_query($conn,$userCheck);

			$count = mysqli_num_rows($result);
			if($count>=1){
				$message = "Username already exists.<br>Please choose another.";
				$_SESSION['message'] = $message;
				header("Location:index.php");
			}
			else{
				mysqli_query($conn,"INSERT INTO users(name,password,email) VALUES ('$userName','$password','$email')");
				$message = "Register Successfull.<br>You can now Log In.";
				$_SESSION['message'] = $message;
				header("Location:index.php");
			}
		}
		else{
			$message = "REGISTRATION ERROR<br>All fields are required to fill in.";
			$_SESSION['message'] = $message;
			header("Location:index.php");
		}
		mysqli_close($conn);
	}	
?>