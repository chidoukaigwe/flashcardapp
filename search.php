<?php

define("TITLE", "Search Results | Flashcard App");

require('config/config.php');

require('config/db.php');

if(isset($_GET['keywords'])){

 $keywords = mysqli_real_escape_string($conn, $_GET['keywords']);

 $query = "SELECT * FROM flashcards WHERE flashcard LIKE '%{$keywords}%' OR title LIKE '%{$keywords}%'
 ";

 $result = mysqli_query($conn, $query);

 $flashcards = mysqli_fetch_all($result, MYSQLI_ASSOC);

 $rowcount=mysqli_num_rows($result);

 mysqli_free_result($result);

 mysqli_close($conn);
}
 ?>

 <?php include('inc/header.php') ;?>

 <?php include('inc/navbar.php') ;?>

     <div class="wrapper">

       <h1>Search Results (<?php echo $rowcount;?>):<span class="search-result-title"><?php echo $_GET['keywords'];?></span></h1>

       <div class="flashcard-display">
         <?php foreach($flashcards as $flashcard): ?>
         <div class="main-flashcard">
           <h2><?php echo $flashcard['title']; ?></h2>
           <p><?php echo $flashcard['flashcard']; ?></p>
           <div class="read-more-holder">
           <a href="<?php echo ROOT_URL; ?>flashcardsingle.php?id=<?php echo $flashcard['id']; ?>"><button>Read More</button></a>
           </div>
         </div>
       <?php endforeach; ?>

       </div> <!--End Of Flashcard Display-->

     </div> <!--End Of Wrapper-->

   <?php include('inc/footer.php') ;?>
