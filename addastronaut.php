<!-- the session start below is used to continue or resume a session that can be based of a POST request or prevouis stored cookies.-->
<?php
session_start();
//the below if statement contains the whole html code and is used as form of security as it requires the user to first login into the webiste through the index page to access anything. if this isnt achieved then they will get bounced back to the index page.
if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    ?>
<html>
	<!-- the section of code below is simple html that contains the title of the page and a linked css document.-->
	<head>
		<title>ESA Management System</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<!-- below we have the code for the top of the page that includes the title of the webiste and the naviagtion bar that is linked with all the other pages. they are all buttons that are customized with css through the class attribute.-->
	
		<h1><a href="home.php">ESA Management System</a></h1>
		<a href="logout.php"><button class="navibutton1">Logout</button></a>
		
		<a href="addastronaut.php"><button class="navibutton1"> Add Astronaut</button></a> | 
		<a href="addtarget.php"><button class="navibutton1">Add Target</button></a> | 
		<a href="addmission.php"><button class="navibutton1">Add Mission</button></a> | 
		<a href="seeastronauts.php"><button class="navibutton1">See Astronaut</button></a> | 
		<a href="seetargets.php"><button class="navibutton1">See Target</button></a> | 
		<a href="seemissions.php"><button class="navibutton1">See Mission</button></a>
		
		<br><hr><br>
		
		<h3>Add Astronaut</h3>

		<!--the php code below allows for us to connect to the database in myphpadmin.-->

		<?php
		$link = mysqli_connect("localhost", "root", "", "spaceagency");
		// Checks connection and has an if statement to tell us if the outcome of the connection through the die function.
		if ($link === false) {
			die("Connection failed: ");
		}
		?>
		<!-- the form tags below contain the main part of the page which is the form itself which gathers the info the user submits. at the end they have used a input tag which is then used later in php for sending the data to the data base. this is possible as we use the name attribute to give "submit a refrence which is used in the php code after the form.-->
	
		<form method="post" action="addastronaut.php">
		
			<label>Astronaut Name:</label>
			<input type="text" name="astronaut_name">
			
			<br>
			
			<label>No of Missions:</label>
			<input type="text" name="no_missions">
			
			<br>
			
			<input class="sumbit_button" type="submit" name="submit">
		
		</form>

		<?php
		//the if statement contains an isset function which is used to check if the variable contained within is already declared or if it is null. then the $_POST is a variable that is used to send data from a form and in this example also sends variables to the database by assigning the prevouis labels that have a name attribute connected to them and then assigning a variable to them which we then give appropriate destinations in the database through the use of the line 65 which inserts all the data from the form into the astronaut table and the related collumns they want the data to go into. they then use a VALUES function to then assign what variables go into whatever columns of the table.

		if (isset($_POST['submit'])) {

			$astronaut_name = $_POST['astronaut_name'];
			$no_missions = $_POST['no_missions'];
			
			$sql = "INSERT INTO astronaut (name, no_missions) VALUES ('$astronaut_name','$no_missions')";
			//the if statement below is used to show if the mysqli_query function that contains the $link and the $sql variables is successfully sent to the database and with the echo functions tells us if outcome with a message. 
			if (mysqli_query($link, $sql)) {
			  echo "New record created successfully";
			} else {
			  echo "Error adding record ";
			}
		
		}
		
		$link->close();
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