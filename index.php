<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

require_once ("Includes/db.php");
$logonSuccess = false;

//verify user credentials. gets request method and if post returns to logon form
//if verify_user_credentials returns true, redirects to editStats.
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $logonSuccess = (LeagueDB::getInstance()->verify_user_credentials($_POST["user"], $_POST["userpassword"]));
    if ($logonSuccess == true) {
        session_start();
        $_SESSION["user"] = $_POST["user"];
        header('Location: editStats.php');
        exit;
    }
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form name="leaguedb" action="leaguedb.php">
            Show summoner information of: <input type="text" name="user" value="" />
            <input type="submit" value="Go" />
        </form>
        <!-- create profile--->
        <br>Want to keep track of your stats? <a href="createNewUser.php">Create profile now</a>
        <form name="logon" action="index.php" method="POST" >
            Username: <input type="text" name="user">
            Password  <input type="password" name="userpassword">
            <?php
            /* displays error message on unsuccesful login*/
                if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                    if (!$logonSuccess)
                        echo "Invalid name and/or password";
                }
              ?>
            <input type="submit" value="Login">
        </form>
    </body>
</html>
