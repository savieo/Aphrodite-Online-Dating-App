<!DOCTYPE html>
<?php
    session_start();
    require_once("php/conn.php");
    require_once("php/user.php");
    if(isset($_POST['login'])){
        $user = $_POST["username"];
        $pass = $_POST["password"];
	    is_user_exist($user, $pass , $_POST["logitude"] , $_POST["latitude"]);
		
	
    }

    if(isset($_SESSION["USERNAME"])) {
        header("location:php/home.php");
    }
    else{ ?>
<html lang="en">
<script>
	getLocation();
	function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
	document.getElementById("logitude").value = position.coords.longitude;
	document.getElementById("latitude").value = position.coords.latitude;

}
	</script>
<head>
  <meta charset="UTF-8">
  <title>Aphrodite</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css"
    integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link rel="icon" type="image/png" href="images/icon/heart-icon.png" />
  <link rel="stylesheet" href="css/main.css">

</head>


<body>
  <img class="logo_heart" src='images/icon/aphrodite-logo4.png' width='245px' height='185px' alt='Aphrodite_logo' />
  <div class="wrapper">
    <div class="login-text">
      <button class="cta"><i class="fas fa-chevron-down fa-1x"></i></button>
      <div class="text">
        <form action="" method="POST">
          <a href="">Login</a>
          <hr>
          <br>
          <input type="text"  id="username"  name="username" placeholder="Username">
          <br>
          <input type="password"  id="password" name="password"  placeholder="Password">
          <br>
		  <input type="hidden" name = "logitude" id="logitude">
				<input type="hidden" name = "latitude" id="latitude">
          <button class="login-btn"  name="login"  type="submit">Log In</button>
          <button type="button"  class="signup-btn" onclick="window.location.href='signup.html'">Sign Up</button>
        </form>
      </div>
    </div>

    <div class="call-text">
      <h1> We are most alive when you're in <span> love </span></h1>
      <button id="hov">Explore the World</button>
    </div>

  </div>


  <script src="script/script.js"></script>

</body>

</html>
<?php } ?>