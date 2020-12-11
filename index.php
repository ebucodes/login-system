<?php
ob_start();
session_start();
//connection
require("config.php");

// PHP query for login
if (isset($_POST["login"])) {
  $userlogin = $_POST["userlogin"];
  $userpassword = md5($_POST["userpassword"]);
  //Query to check if email address already in use  
  $query = "SELECT * FROM user WHERE email_address ='$userlogin' OR username='$userlogin' AND password ='$userpassword'";
  $result = mysqli_query($conn, $query);
  $fetchRow = mysqli_fetch_array($result);
  $numRow = mysqli_num_rows($result);
  // If email address is not in use
  if ($numRow > 0) {
    $_SESSION["id"] = $fetchRow["id"];
    header("Location:welcome.php");
  }
  // Error message for email address in use
  else {
    $message = "<h4 class='card-text alert alert-danger'>Wrong details/h4>";
  }
}

?>


<!doctype html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Login system using PHP and MySQL">
  <meta name="author" content="Ebuka Ohaji">
  <meta name="generator" content="Jekyll v4.0.1">
  <title>EbuCodes . Login</title>

  <!-- CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <form class="card form-signin" method="POST" enctype="multipart/form-data" action="index.php">
    <div class="text-center mb-4">
      <img class="mb-4" src="img/logo.png" alt="" width="200" height="200">
      <h1 class="h3 mb-3 font-weight-normal">SIGN IN</h1>
      <?php
      // Display error message
      if (isset($message)) {
        echo $message;
      }
      ?>
      <p class="card-text">Please fill in the details below to login</p>
    </div>

    <div class="form-label-group">
      <input name="userlogin" type="text" class="form-control" placeholder="Email address/Username" required autofocus>
      <label>Email address/Username</label>
    </div>

    <div class="form-label-group">
      <input name="userpassword" type="password" id="inputPassword" class="form-control" placeholder="Password" required autofocus>
      <label for="inputPassword">Password</label>
    </div>

    <button name="login" class="btn btn-lg btn-primary btn-block" type="submit">SIGN IN</button>
    <p class="mt-5 mb-3 text-muted text-center"></p>
  </form>
</body>

</html>