<?php

define("TITLE", "Flashcard | Flashcard App");

require('config/config.php');

require('config/db.php');

if( isset($_POST['delete']) ){
      $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

      $query = "DELETE FROM flashcards WHERE id = {$delete_id}";

      if(mysqli_query($conn, $query)) {
        header('Location: '. ROOT_URL . 'flashcarddeleted.php');
      } else {
        echo 'ERROR: '. mysqli_error($conn);
      }
  }

$id = mysqli_real_escape_string($conn, $_GET['id']);

$query = 'SELECT * FROM flashcards WHERE id =' . $id;

$result = mysqli_query($conn, $query);

$flashcard = mysqli_fetch_assoc($result);

mysqli_free_result($result);

mysqli_close($conn);

 ?>

<?php include('inc/header.php') ;?>

<?php include('inc/navbar.php') ;?>

    <div class="wrapper">

     <h1><?php echo $flashcard['title']; ?></h1>

      <div class="flashcard-single">

          <p class="flashcard-single-paragraph"><?php echo $flashcard['flashcard']; ?></p>

          <form class="delete-btn" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="delete_id" value="<?php echo $flashcard['id']; ?>">
            <input id="delete-button" type="submit" title="delete flashcard" name="delete" value="&times;">
          </form>

      </div> <!--End Of Flashcard Single-->

      <div class="buttons-holder">
        <a class="flashcard-single-btn" href="<?php echo ROOT_URL; ?>flashcards.php">Back To Flashcards</a>
        <a class="flashcard-single-btn" href="<?php echo ROOT_URL; ?>editflashcard.php?id=<?php echo $flashcard['id']; ?>">Edit Flashcard</a>
      </div>

    </div> <!--End Of Wrapper-->

<?php include('inc/footer.php') ;?>
