<?php 
	session_start();
	require_once("user.php");
	$username = $_SESSION['USERNAME'];
	global $userdata;
	if(isset($_POST['submit_btn'])){
	
		$username=$_POST["username"];
		//echo "Youer username is".$username;
		$firstname=$_POST["firstname"];
		$lastname=$_POST["lastname"];
		$age=$_POST["age"];
		$height=$_POST["height"];
		$weight=$_POST["weight"];
		$password=$_POST["password"];
		update_user_data($username,$firstname,$lastname,$age,$height,$weight,$password);
	}
	
	$userdata=get_user_data($username);
	
	if(isset($_SESSION['USERNAME'])){ ?>
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
								<div class='welcome highlight'>Profile Edit</div>
								<div class='input-fields'>
									<input type='text' placeholder='Username' readonly="readonly" name="username" class='input-line full-width' value=<?= $userdata['username']; ?> />
									<input type='text' placeholder='Firsname' name="firstname" class='input-line full-width' required value=<?= $userdata['firstname']; ?> />
									<input type='text' placeholder='Lastname' name="lastname" class='input-line full-width' value=<?= $userdata['lastname']; ?> />
									<input type='text' placeholder='Age' name="age" class='input-line full-width' required value=<?= $userdata['age']; ?> />

									<label for="Gender">Gender</label>
									<select name="gender" disabled>
									  <option value="0">Male</option>
									  <option value="1">Female</option>
									</select>

									<label for="ethinicity">Ethinicity</label>
									<select name="ethinicity" disabled>
									  <option value="American">American</option>
									  <option value="Latino">Latino</option>
									  <option value="Asian">Asian</option>
									  <option value="Black">Black</option>
									  <option value="White">White</option>
									  <option value="Indian">Indian</option>
									</select>

									<input type='text' value=<?= $userdata['height']; ?> placeholder='Height' name="height" class='input-line full-width' />
									<input type='text' value=<?= $userdata['weight']; ?> placeholder='Weight' name="weight" class='input-line full-width' />

									<input type='text' value=<?= $userdata['password']; ?> placeholder='Password' name="password" class='input-line full-width' />
									
									<span class="error-msg"><?php  ?> </span>
									<!--<div class='spacing'>or continue with <span class='highlight'>Facebook</span></div>-->
									<div><button class='ghost-round full-width' name="submit_btn" type="submit">Update Profile</button></div>
								</div>	
							</form>
						</div>
					</div>
				</div>
			</body>
			</html>
		
	<?php }
	else{
		header("../index.php");
	}
?>

