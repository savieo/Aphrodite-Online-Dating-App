<html>
<?php

session_start();
  if(!isset($_SESSION["USERNAME"])) {
      header("location:http://localhost/phpproject/index.php");
    }
	$currentUser = $_SESSION['USERNAME'];
?>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aphrodite</title>

	<link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="../css/thumbnail-gallery.css">
    <link rel="icon" type="image/png" href="../images/icon/heart-icon.png" />
<link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
	

</head>

<body>

 <div class="nav-container">
        <nav class="nav-wrapper-grid">
            <i class="material-icons" id="mobile-menu-grid">menu</i>
            <ul class="nav-links">
                <li><a href='home.php'>Home</a></li>
                <li><a href="winked.php">My Winks</a></li>
                <li><a href="userDetails.php?selectedUser=<?= $currentUser?>";>My Profile</a></li> 
                <li><a href='logout.php'>LogOut   </a></li>
				
            </ul> 
			
			<div class="search-container">
				<form method="get" id="navsearchform" action="/phpproject/php/home.php">
				<input type="text" id="navsearch" name='search' placeholder="Search.." >
				</form>
			</div>
			
			<!-- <h3 class="title" id="logo-grid">Aphrodite</h3> -->
        </nav>
    </div>
