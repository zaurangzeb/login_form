<!-- the session start below is used to continue or resume a session that can be based of a POST request or prevouis stored cookies.-->
<?php 

session_start(); 
//the include statement below means to include whatever is in the file that is specified which is the db_conn.php into the current file in place of the statement. this just basically allows us to connect to the database through another file.
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {
//this function below allows us to validate the data.
    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }
// below we created 2 variables for the username and password
    $uname = validate($_POST['uname']);

    $pass = validate($_POST['password']);
//the if statement below is to check if the usernme is empty or not and with the header function sends the login page back to its self and display an error for it.
    if (empty($uname)) {

        header("Location: index.php?error=User Name is required");

        exit();
//the else if does the same as the if statement above but just for the password.
    }else if(empty($pass)){

        header("Location: index.php?error=Password is required");

        exit();

    }else{
//this sql query below is to pull data the data from the database where we created another database for the username and passwords that is seperate to the spaceagency database. 
        $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);
//the if statement below is used to check that whatver is inputted into the 2 fields on the login page and see if it matches what was pulled from the database and if it does then the echo function will display the screen with a message saying logged in. then it creates a session with the correctly written login info and with the header function will send the user to the home.php page which is the homepage for the webiste.
            if ($row['user_name'] === $uname && $row['password'] === $pass) {

                echo "Logged in!";

                $_SESSION['user_name'] = $row['user_name'];

                $_SESSION['name'] = $row['name'];

                $_SESSION['id'] = $row['id'];

                header("Location: home.php");

                exit();
// however with the else statements below if anything is written incorrectly then these 2 else statements send the user back to the same login page refreshing it and displaying an error message for the user indicating that they have written something wrong.
            }else{

                header("Location: index.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: index.php?error=Incorect User name or password");

            exit();

        }

    }

}else{

    header("Location: index.php");

    exit();

}