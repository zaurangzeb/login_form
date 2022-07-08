<!-- the session start below is used to continue or resume a session that can be based of a POST request or prevouis stored cookies.-->

<?php
session_start();
//the below if statement contains the whole html code and is used as form of security as it requires the user to first login into the webiste through the index page to access anything. if this isnt achieved then they will get bounced back to the index page.

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    ?>
<html>
	<head>
		<title>ESA Management System</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<!-- below we have the code for the top of the page that includes the title of the webiste and the naviagtion bar that is linked with all the other pages. they are all buttons that are customized with css through the class attribute.-->
	
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
		
		<h3>See Astronaut</h3>
		
		<!--the php code below allows for us to connect to the database in myphpadmin.-->
		
		<?php
		$link = mysqli_connect("localhost", "root", "", "spaceagency");
		// Checks connection and has an if statement to tell us if the outcome of the connection through the die function.
		if ($link === false) {
			die("Connection failed: ");
		}
		?>
		
		<!-- the table below are the headings for the table using simple html table related tags like the tr and th tags.-->
		<table>
		
			<tr>
				<th width="150px">Astronaut ID<br><hr></th>
				<th width="250px">Name<br><hr></th>
				<th width="250px">Number of Missions<br><hr></th>
			</tr>
					<!-- they use another query to grab data from the database and specify what they want from the database thorugh the use of the fetch_assoc function. they then echo a table and instead of inputting thier own data in they use the variable $row to insert the pulled data from the database into the the appropriate collumns.-->
			<?php
			$sql = mysqli_query($link, "SELECT astronaut_id, name, no_missions FROM astronaut");
			while ($row = $sql->fetch_assoc()){
			echo "
			<tr>
				<th>{$row['astronaut_id']}</th>
				<th>{$row['name']}</th>
				<th>{$row['no_missions']}</th>
			</tr>";
			}
			
			
			?>
	
	</body>
</html>

<?php

}
else{
    header("location: index.php");
    exit();
}
?>