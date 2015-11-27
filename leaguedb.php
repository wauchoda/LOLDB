<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>Page of <?php echo htmlentities($_GET["user"])."<br/>";?>
        <?php
        require_once("Includes/db.php");
        $userID = LeagueDB::getInstance()->get_user_id_by_username($_GET["user"]);
        if (!$userID) {
            exit("The user " .$_GET["user"]. " is not found. Please check the spelling and try again" );
        }
        ?>
        <table border="black">
            <tr>
                <th>username</th>
                <th>wins</th>
                <th>losses</th>
                <th>kills</th>
                <th>deaths</th>
                <th>assists</th>
            </tr>
        </table>
        <?php
        $result = LeagueDB::getInstance()->get_stats_by_user_id($userID);
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr><td>" . htmlentities($row["username"]) . "</td>";
            echo "<td>" . htmlentities($row["wins"]) . "</td>";
            echo "<td>" . htmlentities($row["losses"]) . "</td>";
            echo "<td>" . htmlentities($row["kills"]) . "</td>";
            echo "<td>" . htmlentities($row["deaths"]) . "</td>";
            echo "<td>" . htmlentities($row["kills"]) . "</td></tr>\n";
        }
        mysqli_free_result($result);
        ?>
    </body>
</html>
