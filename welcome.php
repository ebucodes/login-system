<?php
ob_start();
include("includes/session.php");
include("includes/config.php");
?>
<!doctype html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Login system using PHP and MySQL">
  <meta name="author" content="Ebuka Ohaji">
  <meta name="generator" content="Jekyll v4.0.1">
  <title>EbuCodes . Welcome</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/style/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="assets/css/welcome.css" rel="stylesheet">
</head>

<body class="text-center">
  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
      <div class="inner">
        <img src="img/logo.png" alt="Logo" width="300" height="300">
      </div>
    </header>

    <main role="main" class="inner cover">
      <h3 class="cover-heading">Welcome: <?php echo $row['firstname'] . " " . $row['lastname']; ?></h3>
      <h4>Username: <?php echo $row['username']; ?></h4>
      <h4>Email address: <?php echo $row['email_address']; ?></h4>
      <p class="lead">If you are viewing this page, it means you have successfully logged into EbuCodes User Registration/Login System</p>
      <p class="lead">
        <a href="logout.php" class="btn btn-lg btn-danger">LOGOUT</a>
      </p>
    </main>


  </div>
</body>

</html>