<?php
    session_start();
    require('config.php');
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
    <link rel="stylesheet" href="https://getbootstrap.com/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/dashboard.css">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Ethical Hacking</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Members <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item 1</a></li>
            <li><a href="">Nav item 2</a></li>
            <li><a href="">Nav item 3</a></li>
            <li><a href="">Nav item 4</a></li>
            <li><a href="">Nav item 5</a></li>
          </ul>
          <ul class="nav nav-sidebar logout">
            <li><a href="logout-script.php">Logout</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <?php
            if(isset($_SESSION['userName'])){
                echo "<h4>Welcome, ".$_SESSION['userName']."</h4>";
            }
          ?>
          <h1 class="page-header">Dashboard</h1>
          <h3 class="page-topic">Fellow Students Enrolled</h3>
          <div class="row placeholders">
            <?php 
                $totalUsersQuery = "SELECT * FROM users";
                $result = mysqli_query($conn,$totalUsersQuery);
                while($totalUsers = mysqli_fetch_assoc($result)){
            ?> 
                    <!--echo $totalUsers['name']."<br>";-->
                    <div class="col-xs-6 col-sm-3 placeholder">
                    <div class="imageCircle"></div>
                    <h4><?php echo $totalUsers['name'] ?></h4>
                    <span class="text-muted"><?php echo $totalUsers['email'] ?></span>
                    </div>
            <?php }
            
            ?>  
        </div>
      </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>
</html>