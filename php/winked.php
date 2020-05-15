<?php include 'header.php'?>
<?php

$properties = (parse_ini_file("properties.ini"));
	$servername = $properties['servername'];
	$username = $properties['username'];
	$password = $properties['password'];
	$conn = new mysqli($servername, $username, $password);
	
	$sql = "SELECT * FROM dating.conversation where (user2 = '$currentUser' and u1u2=1 ) or (user1 = '$currentUser' and u2u1=1 );";
	$result = $conn->query($sql);
?>



 <div class="container gallery-container">
        <h1>Wink.. Chat.. Date..</h1>
        <div class="tz-gallery">

            <div class="row">

<?php

	if ($result->num_rows > 0) {
	 while($row = $result->fetch_assoc()) {
		 $user1=$row["user1"];
		 if($user1 != $currentUser){
		 $statement = "";
		 if($row["u1u2"] == $row["u2u1"])
			  $statement = "You both winked each other ";
		echo "<div class='col-sm-6 col-md-4'><div class='thumbnail'><a href='userDetails.php?selectedUser=$user1';><img src='..\userimgs\\$user1' ></a>";
		echo "<div class='caption'><h3>$user1 $statement</h3></div></div></div>";
		 }   
                            
                            
	 }
	}
?>
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