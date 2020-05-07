<?php
ob_start();
session_start(); 
require_once('inc/db.php');

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, strtolower($_POST['username']));
    $password = mysqli_real_escape_string($conn, $_POST['password']);

     $username = htmlentities($username);
     $password = htmlentities($password);

    $check_username_query = "SELECT * FROM users WHERE username = '$username'";
    $check_username_run = mysqli_query($conn, $check_username_query);

    if (mysqli_num_rows($check_username_run) > 0) {
        $row = mysqli_fetch_array($check_username_run);
        $db_username = $row['username'];
        $db_password = $row['password'];
        $db_role = $row['role'];

        $password = crypt($password, $db_password);

        if ($username == $db_username && $password == $db_password) {
            header('location: index.php');
            session_start();
            $_SESSION['username'] = $db_username;
            $_SESSION['role'] = $db_role;
            
        }
        else{
          $error = "Incorrect Username or Password";
        }
    }
    else{
        $error = "Incorrect Username or Password";
    }

}

/*$salt = '$2y$10$quickbrownfoxjumpsover';
$my_pass = "deepak111";
$password = crypt($my_pass, $salt);*/
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.png">

    <title>Login | S Clothing Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/animated.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin animated shake" action="" method="post">
        <h2 class="form-signin-heading"><span style="color: orange;">S Clothing Login</span></h2>

        <br> 
        <label for="inputEmail" class="sr-only">User Name</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="Username" name="username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label><br>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
        <div class="checkbox">
          <label> 
          <center>
          <?php 
          if (isset($error)) {
            echo "<span style='color:red;'><b>$error</b></span>";
          }
           ?>
          </center>
          </label>
        </div>
        <input type="submit" name="submit" value="Sign In" class="btn btn-lg btn-primary btn-block">
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
