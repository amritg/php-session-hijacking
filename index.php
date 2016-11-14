<?php 
	session_start();

	if (isset($_SESSION["userName"])) {
    	unset($_SESSION["userName"]);
    	unset($_SESSION['message']);
		setcookie("PHPSESSID","",time()-1000,"/");
	}
	// else {
    // 	echo "don't see one";
	// }
	// var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In Form</title>
    <link rel="stylesheet" href="styles/style.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="scripts/script.js"></script>
</head>
<body>
    <div class="form-wrap">
		<div class="tabs">
			<h3 class="signup-tab"><a href="#signup-tab-content">Sign Up</a></h3>
			<h3 class="login-tab"><a class="active" href="#login-tab-content">Login</a></h3>
		</div><!--.tabs-->

		<div class="tabs-content">
			<div class="help-text warning">
				<?php
				if(isset($_SESSION['message'])){
					echo "<p>".$_SESSION['message']."</p>";
				}
			?>
			</div>
			<div id="signup-tab-content">
				<form class="signup-form" action="register.php" method="post">
					<input type="email" class="input" id="user_email" autocomplete="off" placeholder="Email" name="email" required>
					<input type="text" class="input" id="user_name" autocomplete="off" placeholder="Username" name="userName" required>
					<input type="password" class="input" id="user_pass" autocomplete="off" placeholder="Password" name="password" required>
					<input type="submit" class="button" name = "register" value="Sign Up">
				</form><!--.login-form-->
				<div class="help-text">
					<p>By signing up, you agree to the</p>
					<p style="text-decoration:underline;"><a href="http://pdf.textfiles.com/security/palmer.pdf" target="_blank">Terms of service Ethical Hacking</a></p>
				</div><!--.help-text-->
			</div><!--.signup-tab-content-->

			<div id="login-tab-content" class="active">
				<form class="login-form" action="login.php" method="post">
					<input type="text" class="input" id="user_login" autocomplete="off" placeholder="Username" name="userName">
					<input type="password" class="input" id="user_pass" autocomplete="off" placeholder="Password" name="password">
					<input type="submit" class="button" name= "logIn" value="Login">
				</form><!--.login-form-->
				<div class="help-text">
					<p>Never Forget Password</p>
					<p>You will be doomed.</a></p>
				</div><!--.help-text-->
			</div><!--.login-tab-content-->
		</div><!--.tabs-content-->
	</div><!--.form-wrap-->
</body>
</html>