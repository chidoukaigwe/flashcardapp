<?php
session_start();

define("TITLE", "Flashcard App Home | Flashcard App");

require('config/config.php');

require('config/db.php');

$msg = "";
$msgClass = "";

if( isset($_POST['submit']) ){

  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $flashcard = mysqli_real_escape_string($conn, $_POST['flashcard']);

    if( empty($title) || empty($flashcard) ) {

    $msg="Please fill in all fields";

    } else {

      $query = "INSERT INTO flashcards(title, flashcard) VALUES ('$title', '$flashcard')";

      if(mysqli_query($conn, $query)) {

        $last_id = mysqli_insert_id($conn);
        $last_id = ROOT_URL. 'flashcardsingle.php?id=' . $last_id;
        $_SESSION['lastFlashCard'] = $last_id;

        header('Location: '.ROOT_URL .'flashcardsuccess.php');

      } else {

        echo 'ERROR: '. mysqli_error($conn);
      }
  }
}

 ?>

<?php include('inc/header.php') ;?>

<?php include('inc/navbar.php') ;?>

      <div class="banner">
        <div class="banner-text">
          <div class="banner-text-items">
            <h2>flashcard app</h2>
            <p>When you want to memorise something, the flashcard app is your go to place.</p>
            <p>Create &amp; store your flashcards, commit them to memory and learn.</p>
          </div> <!-- End of bannter-text items-->
        </div> <!--End of banner text-->
      </div> <!--End of banner-->

      <h1 class="features-heading">Features</h1>

      <div class="main-content">

        <div class="services">
          <h2>Create</h2>
          <p><i class="fa fa-pencil-square-o"></i></p>
        </div>

        <div class="services">
          <h2>Store</h2>
          <p><i class="fa fa-archive"></i></p>
        </div>

        <div class="services">
          <h2>Memorise</h2>
          <p><i class="fa fa-lightbulb-o"></i></p>
        </div>

      </div> <!--End of main content-->

      <div class="wrapper contact">
          <div class="contact-text">
            <div class="contact-items">

              <h2> Add A Flashcard </h2>

              <?php if($msg != ''): ?>
                <div class="flashcard-notification-msg flashcard-error-msg"><?php echo $msg; ?></div>
              <?php endif; ?>

              <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

                <input type="text" name="title" value="<?php echo isset($_POST['title']) ? $title :  ''; ?>" placeholder="Flashcard Title...">

                <textarea name="flashcard" cols="20" rows="20" placeholder="Flashcard Message..."><?php echo isset($_POST['flashcard']) ? $flashcard :  ''; ?></textarea>

                <input type="submit" name="submit" value="Create Flashcard">

              </form>
            </div>
          </div>
      </div>

<?php include('inc/footer.php') ;?>
