<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
    if ($_SESSION["user"]) {
        echo "Hello " . $_SESSION["user"];
    }
    else
    {
        echo 'NO';
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
<table border="black">
    <tr><th>wins</th><th>losses</th><th>kills<th>deaths</th><th>assists</th></tr>
    <?php
    require_once("Includes/db.php");
    $userID = LeagueDB::getInstance()->get_user_id_by_username($_SESSION["user"]);
    $result = LeagueDB::getInstance()->get_stats_by_user_id($userID);
    while($row = mysqli_fetch_array($result)) {
        echo "<tr><td>" . htmlentities($row['wins']) . "</td>";
        echo "<td>" . htmlentities($row['losses']) . "</td>";
        echo "<td>" . htmlentities($row['kills']) . "</td>";
        echo "<td>" . htmlentities($row['deaths']) . "</td>";
        echo "<td>" . htmlentities($row['assists']) . "</td></tr>\n";
    }
    ?>
</table>
        
        <form name ="addNewStat" action="editStat.php">
            <input type="submit" value="Update Stats">
        </form>
        <!-- return to index page--->
        <form name="backToMainPage" action="index.php">
        <input type="submit" value="Back To Main Page"/>
        </form>
        
    </body>
</html>
