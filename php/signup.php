<?php
  session_start();
  require_once("user.php");
  $user_message="";
  if(isset($_POST['submit_btn'])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    $firstname=$_POST["firstname"];
    $lastname=$_POST["lastname"];
    $age=$_POST["age"];
    $gender=$_POST["gender"];
    $ethinicity=$_POST["ethinicity"];
    $height=$_POST["height"];
    $weight=$_POST["weight"];
    $preference=$_POST["preference"];

    
    
    global $user_message;
    $user_message = create_user($username, $firstname, $lastname, $age, $gender, $ethinicity, $height, $weight, $preference, $password);
    
	}
	function redirect_user() {
		global $user_message;
		global $uname;
		
		if(strpos($user_message,"successfully")){
			echo $user_message;
			header("Refresh: 3 URL='../index.php'");
		}
		else if (strpos($user_message,"available")){
			echo $user_message;
			header("Refresh: 3 URL='signup.php'");
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Join Aphrodite</title>
  <meta name="viewport" content="width=device-width">
  <link rel="icon" type="image/png" href="../images/icon/heart-icon.png" />
  <link rel="stylesheet" href="../css/style.css">

</head>
<body>
	<div class='container'>
		<img class="logo_heart" src='../images/icon/aphrodite-logo4.png' alt='Aphrodite' />
		<div class='window'>
		<div class='overlay'></div>
			<div class='content'>
				<form action="" method="POST" name="sign_up" enctype="multipart/form-data">
					<div class='welcome highlight'>Hello There!</div>
					<div class='subtitle'>We're almost done. Before using Aphrodite you need to create an account.</div>
					<div class='input-fields'>
						<input type='text' placeholder='Username' name="username" class='input-line full-width' required />
						<input type='text' placeholder='Firsname' name="firstname" class='input-line full-width' required />
						<input type='text' placeholder='Lastname' name="lastname" class='input-line full-width' />
						<input type='text' placeholder='Age' name="age" class='input-line full-width' required />

						<label for="Gender">Gender</label>
						<select name="gender">
						  <option value="0">Male</option>
						  <option value="1">Female</option>
						</select>

						<label for="ethinicity">Ethinicity</label>
						<select name="ethinicity">
						  <option value="American">American</option>
						  <option value="Latino">Latino</option>
						  <option value="Asian">Asian</option>
						  <option value="Black">Black</option>
						  <option value="White">White</option>
						  <option value="Indian">Indian</option>
						</select>

						<input type='text' placeholder='Height' name="height" class='input-line full-width' />
						<input type='text' placeholder='Weight' name="weight" class='input-line full-width' />

						<label for="preference">preference</label>
						<select name="preference">
						  <option value="0" disabled>preference</option>
						  <option value="0">Male</option>
						  <option value="1">Female</option>
						</select>
						
						<input type='password' placeholder='Password' name="password" class='input-line full-width' />
						
						<label for="image">Upload Image</label>
						<input type="file" name="file" />
						<span class="error-msg"><?php redirect_user(); ?> </span>
						<!--<div class='spacing'>or continue with <span class='highlight'>Facebook</span></div>-->
						<div><button class='ghost-round full-width' value="create account" name="submit_btn" type="submit">Create Account</button></div>
					</div>	
				</form>
			</div>
		</div>
	</div>
</body>
</html>