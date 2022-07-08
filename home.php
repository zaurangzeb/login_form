<!-- the session start below is used to continue or resume a session that can be based of a POST request or prevouis stored cookies.-->
<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    ?>
<!-- the html code below is just a very simple webpage that has a navigation bar using the a tag with the href attribute allows us to create a navigtion system.-->
<html>
	<head>
		<title>ESA Management System</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
		<h1><a href="home.php">ESA Management System</a></h1>
		<a href="logout.php"><button class="navibutton1">Logout</button></a>
		
		<a href="addastronaut.php"><button class="navibutton1"> Add Astronaut</button></a> | 
		<a href="addtarget.php"><button class="navibutton1">Add Target</button></a> | 
		<a href="addmission.php"><button class="navibutton1">Add Mission</button></a> | 
		<a href="seeastronauts.php"><button class="navibutton1">See Astronaut</button></a> | 
		<a href="seetargets.php"><button class="navibutton1">See Target</button></a> | 
		<a href="seemissions.php"><button class="navibutton1">See Mission</button></a>
		
		<br><hr><br>
		
		<h3>Click on a link above to continue</h3>
	
	</body>
</html>

<?php

}
else{
    header("location: index.php");
    exit();
}
?>