<?php
include('config/myId.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('templates/header.php'); ?>

</head>

<body class="<?php echo htmlspecialchars($bodyClass); ?>">

  <?php include('templates/navbar.php'); ?>
  <div class="container center">
    <div class="row">
      <div class="col s6 offset-s3">
        <h2>Oops 500!</h2>
        <p class="blockquote">It was an Internal server error... Our Webmaster
          has been notified</p>
        <a href="index" class="btn custom-font1 teal-background">Home</a>
      </div>
    </div>

  </div>
  <?php include('templates/footer.php'); ?>
</body>

</html>