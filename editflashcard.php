<?php

define("TITLE", "Edit Flashcard | Flashcard App");

require('config/config.php');

require('config/db.php');

if( isset($_POST['submit']) ){
    $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $flashcard = mysqli_real_escape_string($conn, $_POST['flashcard']);

    $query = "UPDATE flashcards SET
                  title ='$title',
                  flashcard = '$flashcard'
              WHERE id = {$update_id}";

    if(mysqli_query($conn, $query)) {
      header('Location: '. ROOT_URL .'flashcardsingle.php?id=' . $update_id);
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

      <h1>Edit Flashcard</h1>

        <div class="contact-text">
          <div class="contact-items">

            <form class="edit-flashcard-parent" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

              <input class="edit-flashcard-form" type="text" name="title" value="<?php echo $flashcard['title']; ?>">

              <textarea class="edit-flashcard-form" name="flashcard" cols="20" rows="20"><?php echo $flashcard['flashcard']; ?></textarea>

              <input type="hidden" name="update_id" value="<?php echo $flashcard['id']; ?>">
              <input type="submit" name="submit" value="Save">

            </form>
          </div>
        </div>
    </div> <!--End Of Wrapper-->

<?php include('inc/footer.php') ;?>
