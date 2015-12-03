<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
?>
<html>
    <head>
        <link href="stats.css" type="text/css" rel="stylesheet" media="all" />
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="welcome">
            Your Match History
        </div>
        <div class="table">
            <table border="black">
                <tr><th>wins</th><th>losses</th><th>kills<th>deaths</th><th>assists</th></tr>
                <?php
                require_once("Includes/db.php");
                $userID = LeagueDB::getInstance()->get_user_id_by_username($_SESSION["user"]);
                $result = LeagueDB::getInstance()->get_stats_by_user_id($userID);
                while($row = mysqli_fetch_array($result)) {
                    echo "<tr><td>" . htmlentities($row['cid']) . "</td>";
                    echo "<td>" . htmlentities($row['win']) . "</td>";
                    echo "<td>" . htmlentities($row['kills']) . "</td>";
                    echo "<td>" . htmlentities($row['deaths']) . "</td>";
                    echo "<td>" . htmlentities($row['assists']) . "</td>";
                    echo "<td>" . htmlentities($row['cs']) . "</td></tr>\n";
                }
                ?>
            </table>
            <div class="button">
                <form name ="addNewStat" action="editStat.php">
                    <input type="submit" value="Update Stats">
                </form>
                <!-- return to index page--->
                <form name="backToMainPage" action="index.php">
                <input type="submit" value="Back To Main Page"/>
                </form>
                <form type="LogOut" action="index.php">
                    <!--<input type="submit" value="Log Out"/>--->
                    <a href="logout.php" >Logout</a>
                </form>
            </div>
        </div>
        
    </body>
</html>
