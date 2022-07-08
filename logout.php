<!-- the session start below is used to continue or resume a session that can be based of a POST request or prevouis stored cookies.-->
<?php
session_start();
//the session unset function releases all of the variables in the session but is still stored on the computer however when session destroy is then used after it destroys all the data thats in the current session.
session_unset();
session_destroy();
//the header function works like the the a tag in html and just redirects a webage to whatever the the location is set to.
header("location: index.php");