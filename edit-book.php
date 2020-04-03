<?php

session_start();

include('config/db-connect.php');

$book = array('Email' => '', 'BookTitle' => '', 'Author' => '');
$errors = array('email' => '', 'title' => '', 'author' => '');


if (isset($_GET['id'])) {

  $id = $_GET['id'];

  $_SESSION['id'] = $_GET['id'];

  $sql1 = "SELECT * FROM Books WHERE Id = :id ";
  $stmt = $pdo->prepare($sql1);
  $stmt->execute(['id' => $id]);
  $book = $stmt->fetch();
}

if (isset($_POST['submit'])) {

  // check email
  if (empty($_POST['email'])) {
    $errors['email'] = 'An email is required <br>';
  } else {
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'Please enter a valid email address';
    }
  }

  // check title
  if (empty($_POST['title'])) {
    $errors['title'] = 'A title is required <br>';
  } else {
    $title = $_POST['title'];
    if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
      $errors['title'] = 'Title must be letters and spaces only';
    }
  }

  // check author
  if (empty($_POST['author'])) {
    $errors['author'] = 'Author is also required <br>';
  }

  if (!array_filter($errors)) {
    $id     = $_POST['bookToEdit'];
    $email  = $_POST['email'];
    $title  = $_POST['title'];
    $author = $_POST['author'];

    $sql = "UPDATE Books SET Email =:email, BookTitle = :bookTitle, Author = :author WHERE Id =:id ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id, 'email' => $email, 'bookTitle' => $title, 'author' => $author]);

    echo $email . $title . $author . $id;
    header('Location:index');
  } else {
    $email  = $_POST['email'];
    $title  = $_POST['title'];
    $author = $_POST['author'];
  }
} // end of post check
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('templates/header.php'); ?>
</head>

<body class="grey lighten-2 black-text">
  <?php include('templates/navbar2.php'); ?>
  <section class="container grey-text">
    <div class="row">
      <div class="col m8 offset-m2 s12">
        <h4 class="center">Edit Book</h4>
        <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

          <label for="email">Your Email</label>
          <input type="text" name="email" id="email"
            value="<?php echo htmlspecialchars($book->Email); ?>" maxlength="30">
          <div class="red-text"><?php echo $errors['email']; ?> </div>

          <label for="title">Book Title</label>
          <input type="text" name="title" id="title"
            value="<?php echo htmlspecialchars($book->BookTitle); ?>" maxlength="30">
          <div class="red-text"><?php echo $errors['title']; ?> </div>

          <label for="author">Author</label>
          <input type="text" name="author" id="author"
            value="<?php echo htmlspecialchars($book->Author); ?>" maxlength="20">
          <div class="red-text"><?php echo $errors['author']; ?> </div>

          <input type="hidden" name="bookToEdit"
            value="<?php echo htmlspecialchars($book->Id); ?>">

          <div class="center">
            <button class="btn btn-small waves-green z-depth-0" type="submit"
              name="submit">Update
              <i class="material-icons right">send</i>
            </button>
            <a href="index" class="btn btn-small grey darken-4">Close</a>
          </div>
        </form>
      </div>
    </div>
  </section>
  <?php include('templates/footer.php'); ?>
</body>

</html>