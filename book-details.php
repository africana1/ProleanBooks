    <?php
    include('config/db-connect.php');

    if (isset($_POST['deleteBtn'])) {

      $bookIdToDelete = $_POST['bookIdDelete'];

      $sql1 = "DELETE FROM Books WHERE Id = :bookIdToDelete";
      $stmt = $pdo->prepare($sql1);
      $stmt->execute(['bookIdToDelete' => $bookIdToDelete]);

      header('Location: index');
    }

    if (isset($_GET['id'])) {

      $id = $_GET['id'];

      $sql1 = "SELECT * FROM Books WHERE Id = :id ";
      $stmt = $pdo->prepare($sql1);
      $stmt->execute(['id' => $id]);
      $book = $stmt->fetch();
    }

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
      <?php include('templates/header.php'); ?>
    </head>

    <body class="grey lighten-2 black-text">
      <?php include('templates/navbar2.php'); ?>

      <div class="container center">
        <div class="row">
          <div class="col s6 offset-s3">
            <div class="card"
              style="background-color:teal; border-color:darkblue; padding:10px;">
              <div class="card-body white-text">
                <?php if ($book) : ?> </p>
                <h4 class="card-title"><?php echo htmlspecialchars($book->BookTitle); ?>
                </h4>
                <h5 class="card-text">Author:
                  <?php echo htmlspecialchars($book->Author); ?>
                </h5>
                <p>Email: <?php echo htmlspecialchars($book->Email); ?> </p>
                <p> Published: <?php echo htmlspecialchars($book->CreatedAt); ?> </p>

                <!-- Delete Form -->
                <form action="book-details.php" method="post">
                  <input type="hidden" name="bookIdDelete"
                    value="<?php echo htmlspecialchars($book->Id); ?>">
                  <a href="edit-book?id=<?php echo htmlspecialchars($book->Id); ?>"
                    class="btn btn-small grey darken-2">Edit</a>
                  <input type="submit" name="deleteBtn" value="Delete"
                    class="btn btn-small z-depth-0 pink darken-4">
                  <a href="index" class="btn btn-small grey darken-4">Close</a>
                </form>

                <?php else : ?>
                <h5>No Such Book Exist</h5>

                <?php endif; ?>
              </div>
            </div>
          </div>

        </div>

      </div>

      <?php include('templates/footer.php'); ?>
    </body>

    </html>