<?php
  session_start();

  if($_SESSION['USERNAME']==true){ ?>
      <!DOCTYPE html>
      <html lang="en">

      <head>
        <meta charset="UTF-8">
        <title>welcome <?= $_SESSION['USERNAME'] ?> </title>
        
      </head>

      <body>
        <h1> welcome <?= $_SESSION['USERNAME'] ?></h1>

        <a href='logout.php'>Log out</a>
      </body>

      </html>
  <?php }

  else{
    header("location:../index.php");
  }
?>

