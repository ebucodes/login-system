<?php
ob_start();
session_start();
include("config.php"); ?>
<?php

// Query for registeration
if (isset($_POST["register"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $email_address = $_POST["email_address"];
    $password = $_POST["password"];
    $password = md5($password);
    // To store user's data with strong security
    $firstname = mysqli_real_escape_string($conn, $firstname);
    $lastname = mysqli_real_escape_string($conn, $lastname);
    $username = mysqli_real_escape_string($conn, $username);
    $email_address = mysqli_real_escape_string($conn, $email_address);
    $password = mysqli_real_escape_string($conn, $password);


    // To check if the user already exists
    $sql1 = "SELECT email_address FROM user WHERE email_address='$email_address' ";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_num_rows($result1);
    // To check if the user already exists
    $sql2 = "SELECT username FROM user WHERE username='$username'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_num_rows($result2);
    if ($row1 > 0) {
        $message = "<h3 class='card-text alert alert-danger'>Email address already in use. Please try again.</h3>";
    } 
    elseif ($row2 > 0) {
  $message = "<h3 class='card-text alert alert-danger'>Username already in use. Please try again.</h3>";
    }
    else {
        $query = mysqli_query($conn, "INSERT INTO user (firstname, lastname, username, email_address, password) VALUES('$firstname', '$lastname', '$username','$email_address','$password')");
        if ($query) {
            header("Location:index.php");
        }
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
  <title>EbuCodes . Register</title>

  <!-- CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css.css" rel="stylesheet">
</head>

<body>
    <form class="card form-signin" method="POST" enctype="multipart/form-data" action="register.php">
        <div class="text-center mb-4">

            <img class="mb-4" src="img/logo.png" alt="" width="200" height="200">
            <h1 class="h3 mb-3 font-weight-normal">Registration Form</h1>
            <?php if (isset($message)) {
                echo $message;
            } ?>
            <p class="card-text">Please fill in the details below to register</p>
        </div>

        <div class="form-label-group">
            <input name="firstname" type="text" class="form-control" placeholder="Firstname" required autofocus>
            <label>Firstname</label>
        </div>

        <div class="form-label-group">
            <input name="lastname" type="text"  class="form-control" placeholder="Lastname" required autofocus>
            <label>Lastname</label>
        </div>

        <div class="form-label-group">
            <input name="username" type="text" class="form-control" placeholder="Username" required autofocus>
            <label>Username</label>
        </div>

        <div class="form-label-group">
            <input name="email_address" type="email" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputEmail">Email address</label>
        </div>

        <div class="form-label-group">
            <input name="password" type="password" class="form-control" placeholder="Password" required autofocus>
            <label>Password</label>
        </div>

        <button name="register" class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        <p class="mt-5 mb-3 text-muted text-center"></p>
    </form>
</body>

</html>