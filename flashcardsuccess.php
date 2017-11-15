<?php
session_start();

define("TITLE", "Flashcard Success | Flashcard App");

require('config/config.php');

require('config/db.php');
?>

<?php include('inc/header.php') ;?>

<?php include('inc/navbar.php') ;?>

    <div class="wrapper flashcard-creation-success">
        <div class="contact-text">
          <div class="contact-items">

            <h2> Flashcard Created! </h2>

            <a class="flashcard-notification-msg flashcard-layout view-flashcard" href="<?php echo $_SESSION['lastFlashCard']; ?>">view flashcard</a>

            <a class="flashcard-notification-msg flashcard-layout create-flashcard" href="<?php echo ROOT_URL; ?>addflashcard.php">create flashcard</a>

            <a class="flashcard-notification-msg flashcard-layout latest-flashcards" href="<?php echo ROOT_URL; ?>flashcards.php">latest flashcards</a>

          </div>
        </div>
    </div>

<?php include('inc/footer.php') ;?>
