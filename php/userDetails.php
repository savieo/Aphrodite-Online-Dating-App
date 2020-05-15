<!DOCTYPE html>
<?php include 'header.php'?>
<link href="../css/userprofile.css" rel="stylesheet">
<?php

$selectedUser = '';
$properties = (parse_ini_file("properties.ini"));
	$servername = $properties['servername'];
	$username = $properties['username'];
	$password = $properties['password'];
	$conn = new mysqli($servername, $username, $password);

	
	if(!isset($_GET['selectedUser'])){
		echo "NO User Found :(";
		return 0;
	}
	else{
		$selectedUser = $_GET['selectedUser'];
	}
	
	
if(isset($_GET['sendwink']) == 1 && $_GET['sendwink'] == 1){
	$sendWink=$_GET['sendwink'];
	
	$sql = "SELECT * FROM dating.conversation where user1 ='$selectedUser' and user2 = '$currentUser' ;";
		$result = $conn->query($sql);
	if ($result->num_rows == 0) {
		$sql = "SELECT * FROM dating.conversation where user1 ='$currentUser' and user2 = '$selectedUser' ;";
		$result = $conn->query($sql);
	}

	if($result->num_rows > 0){
		
		 while($row = $result->fetch_assoc()) {
			$uu1  = $row["user1"]; 
			$uu2 = $row["user2"];
			
	 }
	 if($uu1 == $currentUser)
		$sql = "UPDATE `dating`.`conversation` SET `u1u2` = '1' WHERE (`user1` = '$uu1' and `user2` = '$uu2')";
	 else
		 $sql = "UPDATE `dating`.`conversation` SET `u2u1` = '1' WHERE (`user1` = '$uu1' and `user2` = '$uu2')";
		
	}
	else{
		$sql = "INSERT INTO dating.conversation (`user1`, `user2`, `u1u2`) VALUES ('$currentUser', '$selectedUser', '1');";
	}
	if ($conn->query($sql) === TRUE) {
		echo "Winked succesfully ";
	}
	else {
    echo "Error updating record: " . $conn->error;
}
}
else{
	$sendWink = true;
}
	
	
	$sql = "select * from dating.users where username = '$selectedUser';";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	 while($row = $result->fetch_assoc()) {
		 $currPreference = $row["preference"];
		 $currentGender = $row["sex"];
		 $firstname = $row["firstname"];
		 $lastname = $row["lastname"];
		 $status = $row["status"];
		 $ethnicity = $row["ethnicity"];
		 $height = $row["height"];
		 $weight = $row["weight"];
	 }
	
}

	$isDisplay = true;
	$sql =  "SELECT * FROM dating.conversation where user1 ='$selectedUser' and user2 = '$currentUser' and u2u1 = 1;";
	$result1 = $conn->query($sql);
	if ($result1->num_rows == 0) {
							
			$sql =  "SELECT * FROM dating.conversation where user2 ='$selectedUser' and user1 = '$currentUser' and u1u2 = 1;";
			$result1 = $conn->query($sql);
	}
	?>
							
    <div class="container gallery-container">
            <img class="logo_heart" src='../images/icon/aphrodite-logo4.png' width='245px' height='185px' alt='Aphrodite_logo' />
        <h1>My profile..</h1>
        <div class="tz-gallery">

            <div class="row">
                <div class="col-sm-12 col-md-12 ss">
                        
                    <div class="thumbnail">
                        <a class="lightbox" href='..\userimgs\<?php echo $selectedUser?> '>
                            <img src='..\userimgs\<?php echo $selectedUser?> ' >
                        </a>
                        <div class="caption">
                            <h3><?= $selectedUser ?> 23</h3>
                             
                            <br> <br><?php
							if($result1->num_rows > 0)
								$isDisplay = false;
							
							if($currentUser != $selectedUser && $isDisplay){
								?>
								<form action="<?=$_SERVER['PHP_SELF'];?>">
									<input type="hidden" name="selectedUser" value="<?= $selectedUser ?>">
									<input type="hidden" name="sendwink" value="<?= $sendWink ?>">
									<input class="myButton" type="submit" value="Wink Up 💚" >
								</form>	
								<?php
							}
							elseif(!$isDisplay)
								echo "<h4>Already Winked the user</h4>";
							if($selectedUser == $currentUser){
								echo "<input type='button' value='Edit Profile' onclick="."window.location.href='profileupdate.php'".">";
							}
						?>
                         </br></br>   
                        <h4><strong>Last name: </strong><?php echo $lastname ?></h4>
                        <h4><strong>Gender: </strong><?php echo  $currentGender==0?"male":"female" ?></h4>
						<h4><strong>ethnicity: </strong><?php echo  $ethnicity  ?></h4>
						<h4><strong>height: </strong><?php echo  $height ?></h4>
						<h4><strong>weight: </strong><?php echo  $weight ?></h4>
						<h4><strong>preference: </strong><?php echo  $currPreference==0?"male":"female" ?></h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script>
        // baguetteBox.run('.tz-gallery');
        baguetteBox.run('.tz-gallery', {
            animation: 'fadeIn',
            noScrollbars: true,
            buttons: false,
            captions: function (element) {
                return element.getElementsByTagName('img')[0].alt;
            }
        });

    </script>
</body>

</html>