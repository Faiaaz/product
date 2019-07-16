<?php

session_start();

$con = mysqli_connect("localhost","root","","social");

if(mysqli_connect_errno()){
    echo "failed to connect: " . mysqli_connect_errno();
}

// declaring variables to prevent errors

$fname = "";
$lname = "";
$em = ""; // email
$em2 = "";
$password = "";
$password2 = "";
$date = ""; // sign up date
$error_array = array(); // hold error msg

if (isset($_POST['register_button'])){
    // registration form values

    $fname = strip_tags($_POST['reg_fname']);  // remove html tags
    $fname = str_replace(' ','',$fname); // remove spaces
    $fname = ucfirst(strtolower($fname)); // first convert all to lowercase then make first char uppercase

    $_SESSION['reg_fname'] = $fname;   // store in session variable

    $lname = strip_tags($_POST['reg_lname']);  // remove html tags
    $lname = str_replace(' ','',$lname); // remove spaces
    $lname = ucfirst(strtolower($lname)); // first convert all to lowercase then make first char uppercase

    $_SESSION['reg_lname'] = $lname;   // store in session variable

    $em = strip_tags($_POST['reg_email']);  // remove html tags
    $em = str_replace(' ','',$em); // remove spaces
    $em = ucfirst(strtolower($em)); // first convert all to lowercase then make first char uppercase

    $_SESSION['reg_email'] = $em;   // store in session variable

    $em2 = strip_tags($_POST['reg_email2']);  // remove html tags
    $em2 = str_replace(' ','',$em2); // remove spaces
    $em2 = ucfirst(strtolower($em2)); // first convert all to lowercase then make first char uppercase

    $_SESSION['reg_email2'] = $em2;   // store in session variable

    $password = strip_tags($_POST['reg_password']);  // remove html tags

    $password2 = strip_tags($_POST['reg_password2']);  // remove html tags

    $date = date("Y-m-d"); // gets current date

    if ($em == $em2){

        if (filter_var($em, FILTER_VALIDATE_EMAIL)){
            $em = filter_var($em, FILTER_VALIDATE_EMAIL);

            // check if email already exists

            $e_check = mysqli_query($con, "SELECT email FROM users where email='$em'");

            // Count the number of rows returned

            $num_rows = mysqli_num_rows($e_check);

            if ($num_rows > 0){

                array_push($error_array,"Email already in use<br>");
            }
        }
        else{
            array_push($error_array,"invalid email format<br>");
        }
    }
    else{
        array_push($error_array,"emails do not match<br>");
    }

    if (strlen($fname)>25 || strlen($fname<2)){
        array_push($error_array,"first name must be between 2 to 25 characters<br>");
    }
    if (strlen($lname)>25 || strlen($lname<2)){
        array_push($error_array,"last name must be between 2 to 25 characters<br>");
    }

    if ($password != $password2){
        array_push($error_array,"passwords do not match!<br>");
    }
    else{
        if (preg_match('/[^A-Za-z0-9]/',$password)){
            array_push($error_array,"password can contain only english numbers or characters<br>");
        }
    }

    if (strlen($password) > 30 || strlen($password) < 5){
        array_push($error_array,"password must be between 5 to 30 characters<br>");
    }

    // if there are no errors
    if (empty($error_array)){
        $password = md5($password); // encrypt password before sending to database

        // generate username by concatenating first name and last name

        $username = strtolower($fname . "_" . $lname);
        $check_username_query = mysqli_query("$con", "SELECT username FROM users WHERE username = '$username' ");

        $i = 0;

        // if username exists add number to username
        while (mysqli_num_rows($check_username_query) != 0 ){
            $i++;
            $username = $username . "_" . $i;
            $check_username_query = mysqli_query("$con", "SELECT username FROM users WHERE username = '$username' ");

        }

        // assign profile picture

        $profile_pic = "";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>welcome to buzzfeed!</title>
</head>
<body>

<form action="register.php" method="post">
    <input type="text" name="reg_fname" placeholder="First Name" value="
      <?php if (isset($_SESSION['reg_fname'])){
          echo $_SESSION['reg_fname'];
    } ?>" required><br>

    <?php if (in_array("first name must be between 2 to 25 characters<br>",$error_array)) echo "first name must be between 2 to 25 characters<br>"?>

    <input type="text" name="reg_lname" placeholder="Last Name"  value="
      <?php if (isset($_SESSION['reg_lname'])){
        echo $_SESSION['reg_lname'];
    } ?>" required><br>

    <?php if (in_array("last name must be between 2 to 25 characters<br>",$error_array)) echo "last name must be between 2 to 25 characters<br>"?>


    <input type="email" name="reg_email" placeholder="Email"  value="
      <?php if (isset($_SESSION['reg_email'])){
        echo $_SESSION['reg_email'];
    } ?>" required><br>


    <input type="email" name="reg_email2" placeholder="Confirm email"  value="
      <?php if (isset($_SESSION['reg_email2'])){
        echo $_SESSION['reg_email2'];
    } ?>" required><br>


    <?php if (in_array("Email already in use<br>",$error_array)) echo "Email already in use<br>";
     else if (in_array("invalid email format<br>",$error_array)) echo "invalid email format<br>";
     else if (in_array("emails do not match<br>",$error_array)) echo "emails do not match<br>"?>


    <input type="password" name="reg_password" placeholder="Password" required><br>
    <input type="password" name="reg_password2" placeholder="Confirm password" required><br>

    <?php if (in_array("passwords do not match!<br>",$error_array)) echo "passwords do not match!<br>";
    else if (in_array("password can contain only english numbers or characters<br>",$error_array)) echo "password can contain only english numbers or characters<br>";
    else if (in_array("password must be between 5 to 30 characters<br>",$error_array)) echo "password must be between 5 to 30 characters<br>"?>


    <input type="submit" value="Register" name="register_button">

</form>




</body>
</html>