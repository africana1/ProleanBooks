<?php

include('config/db-connect.php');
include('config/myId.php');

$title = $email = $author = '';
$errors = array('email' => '', 'title' => '', 'author' => '');

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

    $email  = $_POST['email'];
    $title  = $_POST['title'];
    $author = $_POST['author'];

    $sql = "INSERT INTO Books(Id, Email, BookTitle, Author) VALUES(:id, :email, :bookTitle, :author)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id, 'email' => $email, 'bookTitle' => $title, 'author' => $author]);

    header('Location:index');
  }
} // end of post check
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('templates/header.php'); ?>
</head>

<body class="<?php echo htmlspecialchars($bodyClass) ?>">
  <?php include('templates/navbar2.php'); ?>
  <section class="container grey-text">
    <div class="row">
      <div class="col m8 offset-m2 s12">
        <h4 class="center">Add a Book</h4>
        <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <label for="email">Your Email</label>
          <input type="text" name="email" id="email"
            value="<?php echo htmlspecialchars($email); ?>" maxlength="30">
          <div class="red-text"><?php echo $errors['email']; ?> </div>

          <label for="title">Book Title</label>
          <input type="text" name="title" id="title"
            value="<?php echo htmlspecialchars($title); ?>" maxlength="30">
          <div class="red-text"><?php echo $errors['title']; ?> </div>

          <label for="author">Author</label>
          <input type="text" name="author" id="author"
            value="<?php echo htmlspecialchars($author); ?>" maxlength="20">
          <div class="red-text"><?php echo $errors['author']; ?> </div>

          <div class="center">
            <!-- <input type="submit" class="btn" value="Submit"> -->

            <button class="btn waves-green z-depth-0" type="submit" name="submit">Submit
              <i class="material-icons right">send</i>
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>
  <?php include('templates/footer.php'); ?>
</body>

</html>