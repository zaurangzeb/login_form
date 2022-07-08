<?php

    $sname = "localhost";
    $unmae = "root";
    $password = "";

    $db_name = "test_db";

    $conn = mysqli_connect($sname, $unmae, $password, $db_name );

    if(!$conn) {
        echo "connection failed";
    }
    ?>
    <!-- this bit of php code below using the mysqli_connect function allows a connection to the main european space agency some paremeters to allow for a connection-->
    <?php
		$link = mysqli_connect("localhost", "root", "", "spaceagency");
		// Checks connection and has an if statement to tell us if the outcome of the connection
		if ($link === false) {
			die("Connection failed: ");
		}
		?>