<?php
session_start();
/// database connection call
require_once("Includes/db.php");
/** other variables */
$userNameIsUnique = true;
$passwordIsValid = true;				
$userIsEmpty = false;	
$emailIsEmpty = false;
$emailIsUnique = true;
$passwordIsEmpty = false;				
$password2IsEmpty = false;

/** Check that the page was requested from iself via the POST method */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /** Check whether the user has filled in the user's name in the text field "user" */
    
    $userID = LeagueDB::getInstance()->get_user_id_by_username($_POST["user"]);
    $email = LeagueDB::getInstance()->get_email($_POST["email"]);
    if ($userID) {
       $userNameIsUnique = false;
    }
    if ($_POST["user"]=="") {
        $userIsEmpty = true;
    }
    if ($_POST["email"]=="") {
        $emailIsEmpty = true;
    }
    if ($email) {
        $emailIsUnique = false;
    }
    if ($_POST["password"]=="") {
        $passwordIsEmpty = true;
    }
    if ($_POST["password2"]=="") {
        $password2IsEmpty == true;
    }
    if ($_POST["password"]!=$_POST["password2"]) {
        $passwordIsValid = false;
    }
    /** Check whether the boolean values show that the input data was validated successfully.
     * If the data was validated successfully, add it as a new entry in the "league" database.
     * After adding the new entry, close the connection and redirect the application to editWishList.php.
     */
    if (!$userIsEmpty && $userNameIsUnique && !$emailIsEmpty && $emailIsUnique && !$passwordIsEmpty && !$password2IsEmpty && $passwordIsValid) {
        //$sql = LeagueDB::getInstance();
        //$result = mysqli_query($sql, 
            //"CALL create_new_user" . ($_POST['user'] . "," . $_POST['password']));
        LeagueDB::getInstance()->create_user($_POST["user"], ($_POST["email"]), $_POST["password"]);
        //$this->query("CALL create_new_user($username, $password)");
        $_SESSION["user"] = $_POST['user'];
        echo $_SESSION["user"];
        header('Location: dashboard.php' );
        exit;
    }
    
}
?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title></title>
</head>
    <body>
      Welcome!<br>
        <form action="createNewUser.php" method="POST">
            <?php
            if ($userIsEmpty) {
                echo ("Enter your name, please!");
                echo ("<br/>");
            }
            if (!$userNameIsUnique) {
                echo ("The person already exists. Please check the spelling and try again");
                echo ("<br/>");
            }
            ?>
            Your username: <input type="text" name="user"/><br/>
            Your email: <input type="text" name="email"/><br/>
            <?php
            if ($emailIsEmpty) {
                echo ("Enter an email address, please!");
                echo ("<br/>");
            }
            if (!$emailIsUnique) {
                echo ("Opps! That email is already in use! Enter another email.");
                echo ("<br/>");
            }
            ?>
            Password: <input type="password" name="password"/><br/>
            <?php
            if ($passwordIsEmpty) {
                echo ("Enter the password, please!");
                echo ("<br/>");
            }                
            ?>
            Please confirm your password: <input type="password" name="password2"/><br/>
            <?php
            if ($password2IsEmpty) {
                echo ("Confirm your password, please");
                echo ("<br/>");    
            }                
            if (!$password2IsEmpty && !$passwordIsValid) {
                echo  ("The passwords do not match!");
                echo ("<br/>");  
            }                 
           ?>
            <input type="submit" value="Register"/>
        </form>
     </body>
</html>
