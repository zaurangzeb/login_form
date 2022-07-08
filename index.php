<!DOCTYPE html>
<!-- this login page is the actuall html loginform page that is linked to the login.php file throught the use of the variables.-->
<html>

<head>

    <title>LOGIN</title>

    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
<!-- the from tag below is using the action attribute which determines where the data is sent when the form is sumbitted -->
     <form action="login.php" method="post">

        <h2>LOGIN</h2>
<!-- the php code below is used to display an error if anthing goes wrong.-->
        <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>
<!-- the couple of label tags below is used to display the whatever text is contained inbetween the labe tag on the secreen. then the input tag is used to create a text field that has a placeholder text within them. then theres a submit button which allows the from to be submitted.-->
        <label>User Name</label>

        <input type="text" name="uname" placeholder="User Name"><br>

        <label>Password</label>

        <input type="password" name="password" placeholder="Password"><br> 

        <button class="sumbit_button" type="submit">Login</button>

     </form>

</body>

</html>