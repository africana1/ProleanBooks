<?php

include('config/db-connect.php');
include('config/myId.php');

$sql = "SELECT * FROM Books";
$stmt = $pdo->prepare($sql);
$stmt->execute([]);
$books = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('templates/header.php'); ?>
</head>

<body class="<?php echo htmlspecialchars($bodyClass) ?>">
  <?php include('templates/navbar.php'); ?>
  <h4 class="center grey-4">Total Books: <?php echo htmlspecialchars(count($books)) ?>
  </h4>
  <div class="container">
    <div class="row">
      <?php foreach ($books as $book) : ?>
      <div class="col s4">
        <div class="card z-depth-0 grey lighten-1">
          <img src="assets/images/password.ico" alt="Book Icon" class="bookLogo">
          <div class="card-content center" style="font-family: georgia">
            <h6><?php echo htmlspecialchars($book->BookTitle); ?></h6>
            <div><?php echo htmlspecialchars($book->Author); ?></div>
          </div>
          <div class="card-action right-align teal" style="font-family: monospace">
            <a href="book-details?id=<?php echo htmlspecialchars($book->Id); ?>"
              class="btn waves-effect white-text">More Info</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>

    </div>
  </div>

  <?php include('templates/footer.php'); ?>

</body>

</html>