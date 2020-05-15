<!DOCTYPE html>
<html>

<?php include 'header.php'?>


 <div class="container gallery-container">
        <h1>Wink.. Chat.. Date..</h1>
        <div class="tz-gallery">

            <div class="row">

               
 <?php
$properties = (parse_ini_file("properties.ini"));
$servername = $properties['servername'];
$username = $properties['username'];
$password = $properties['password'];

// Create connection
$conn = new mysqli($servername, $username, $password);

$curUSer = "SELECT * FROM dating.users where username = '$currentUser';";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query($curUSer);

//echo "<div class='row'>";
$currPreference="";
$currentGender="";

if ($result->num_rows > 0) {
	 while($row = $result->fetch_assoc()) {
		 $currPreference = $row["preference"];
		 $currentGender=$row["sex"];
		 $currentlon = $row["longitude"];
		 $currentlat = $row["latitude"];
	 }
	
}
$targetGender = $currentGender;
$targetPreference = $currPreference;
if($currPreference != $currentGender){
	$targetGender = $currPreference;
	$targetPreference = $currentGender;
}
if(isset($_GET['search'])){
	$searchVal=$_GET['search'];
	$sql = "select * , st_distance_sphere(POINT($currentlat, $currentlon ), POINT(latitude, longitude ))/1000  as dis FROM dating.users where username like '$searchVal%'";
}
else{	
	$sql = "SELECT * , st_distance_sphere(POINT($currentlat, $currentlon ), POINT(latitude, longitude ))/1000  as dis FROM dating.users where username <> '$currentUser' and preference = '$targetPreference' and sex = '$targetGender' order by dis asc ;";
}
$result = $conn->query($sql);
$rowcount = 0;
$collumnCount =0;
if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
	
		$imgname = $row["username"];
		$age = $row['age'];
		$name = $row['firstname'] . "($age)";
		$dis = $row['dis'];
		echo "<div class='col-sm-6 col-md-4'><div class='thumbnail'><a href='userDetails.php?selectedUser=$imgname';><img src='..\userimgs\\$imgname' ></a>";
        $dis = number_format((float)$dis, 2, '.', '');
        echo "<div class='caption'><h3>$name (distance $dis km)</h3></div></div></div>";	
    }
} 

die();
function addHeightFilter(){
	
}
function addAthinicityFilter(){
	
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