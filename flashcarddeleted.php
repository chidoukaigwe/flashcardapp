<?php

define("TITLE", "Flashcard Deleted | Flashcard App");

require('config/config.php');

require('config/db.php');
?>

<?php include('inc/header.php') ;?>

<?php include('inc/navbar.php') ;?>

    <div class="wrapper flashcard-deleted">
        <div class="contact-text">
          <div class="contact-items">

            <h2> Flashcard Deleted! </h2>

            <div class="flashcard-notification-msg flashcard-layout create-flashcard"><a href="<?php echo ROOT_URL; ?>addflashcard.php">create flashcard</a></div>

            <div class="flashcard-notification-msg flashcard-layout latest-flashcards"><a href="<?php echo ROOT_URL; ?>flashcards.php">latest flashcards</a></div>

          </div>
        </div>
    </div>

<?php include('inc/footer.php') ;?>
