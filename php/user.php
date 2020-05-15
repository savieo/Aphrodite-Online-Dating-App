<?php 
// function to update user data

function update_user_data($uname,$firstname,$lastname,$age,$height,$weight,$password) {
	require("conn.php");
	//echo "user name is". $uname;
	$update_command = "UPDATE users SET username='$uname' , firstname='$firstname', lastname='$lastname', age='$age' , height='$height' , weight='$weight', password='$password' WHERE username='$uname'";
	$mysqli->query($update_command);
	header("refresh:1,URL='home.php'");
}

function get_user_data($uname){
	require("conn.php");
	$select_command = "SELECT * FROM users where username='$uname'";
	$res = $mysqli->query($select_command);
	$row = $res->fetch_assoc();
	return $row;
}

// function to create user in the database 
function create_user($uname, $firstname, $lastname, $age, $gender, $ethinicity, $height, $weight, $preference,  $password){
	$message="";
	require("conn.php");
	$select_command = "SELECT * FROM users where username='$uname'";	
	$res = $mysqli->query($select_command);
	
	// if user is not available then it adds the user information in the users table;
	if($res->num_rows==0){
		$insert_command ="INSERT INTO `users` (`username`, `firstname`, `lastname`, `age`, `sex`, `ethnicity`, `height`, `weight`, `preference`, `password`) VALUES ('$uname', '$firstname', '$lastname', '$age', '$gender', '$ethinicity', '$height', '$weight', '$preference','$password');";
		$mysqli->query($insert_command);

		// image upload
		$FILE_DATA_NAME = "file";
   		$tname = $_FILES[$FILE_DATA_NAME]["tmp_name"];
		$uploads_dir = '../userimgs';
    	move_uploaded_file($tname, $uploads_dir.'/'.$uname.'.jpeg');

		$message="$uname is successfully created";
	}
	else{
		$message="Username $uname is not available. Choose different username";
	}
	return $message;
}

function is_user_exist($user, $pass , $logitude,$latitude) {
	require("conn.php");
	$select_command = "SELECT username, password FROM users where username='$user' && password='$pass'";
	$res = $mysqli->query($select_command);
	// if execute if user exist in the database
	if($res->num_rows==true){
		$_SESSION['USERNAME']=$user;
		updateLocation($logitude,$latitude, $user);
		header("location:php/home.php");	
	}
	else{
		header("location:index.php");
	}

}
function updateLocation($logitude,$latitude, $user){
	require("conn.php");
	$updateLocation = "UPDATE `dating`.`users` SET `latitude` = '$latitude', `longitude` = '$logitude' WHERE (`username` = '$user')";
	$res = $mysqli->query($updateLocation);
}
?>