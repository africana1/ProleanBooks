<?php
header("HTTP/1.0 500 Internal Server Error");

session_start();

unset($_SESSION['id']);
unset($_SESSION['userName']);
unset($_SESSION['password']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('templates/header.php'); ?>

</head>

<body>

  <?php include('templates/navbar.php'); ?>

  <div class="site-section" data-aos="fade-up">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <img src="assets/images/about_1.jpg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 pl-md-5">
          <h2 class="text-black display-4">Oops 500!</h2>
          <p class="lead">It was an Internal server error... Our Webmaster
            has been notified</p>
          <a href="index" class="btn custom-font1 teal-background">Home</a>
        </div>
      </div>
    </div>
  </div>


  <?php include('templates/footer.php'); ?>

</body>

</html>