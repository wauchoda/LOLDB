<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
/* no user is logged on */
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
        <link href="stats.css" type="text/css" rel="stylesheet" media="all" />
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class ="showStats">
            <input type="submit" name="stats" value="Show Stats of" onclick="javascript:showHideShowStatsForm()"/>
            <form name="leaguedb" action="leaguedb.php" style="visibility: hidden">
                <input type="text" name="user" />
                <input type="submit" value="Go" />
            </form>
        </div>
        
        <!-- create profile--->
        <div class="createUser">
            <!--<br>Want to keep track of your stats? <a href="createNewUser.php">Create profile now</a>--->
        </div>
        
        <div class="logon">
            <input type="submit" name="MyStats" value="My Stats" onclick="javascript:showHideLogonForm()"/>
                <form name="logon" action="index.php" method="POST" 
                        style="visibility: <?php if ($logonSuccess) echo "hidden"; else echo "visible";?>">
                    <div id ="userlog">Username: <input type="text" name="user"></div>
            Password:  <input type="password" name="userpassword">
            <div class="error">
                <?php
                /* displays error message on unsuccesful login*/
                    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                        if (!$logonSuccess)
                            echo "Invalid name and/or password";
                    }
                  ?>
            </div>
                <input type="submit" value="Login">
            </form>
            <br>Want to keep track of your stats?<br> <a href="createNewUser.php">Create profile now</a>
        </div>
        <script>
            function showHideLogonForm() {
                if (document.all.logon.style.visibility == "visible"){
                    document.all.logon.style.visibility = "hidden";
                    document.all.myStats.value = "My Stats >>";
                } 
                else {
                    document.all.logon.style.visibility = "visible";
                    document.all.myStats.value = "<< My Stats";
                }
            }
            function showHideShowStatsForm() {
                if (document.all.leaguedb.style.visibility == "visible") {
                    document.all.leaguedb.style.visibility = "hidden";
                    document.all.showStats.value = "Show Stats of >>";
                }
                else {
                    document.all.leaguedb.style.visibility = "visible";
                    document.all.showStats.value = "<< Show Stats of";
                }
            }
        </script>
    </body>
</html>
