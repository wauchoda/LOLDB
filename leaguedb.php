<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link href="stats.css" type="text/css" rel="stylesheet" media="all" />
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="welcome">
            Page of <?php echo htmlentities($_GET["user"])."<br/>";
            $username = $_GET["user"];
            ?>            
        </div>
        <?php
        require_once("Includes/db.php");
        //$userID = LeagueDB::getInstance()->get_user_id_by_username($_GET["user"]);
        //if (!$userID) {
          //  exit("The user " .$_GET["user"]. " is not found. Please check the spelling and try again" );
        //}
        ?>
        <div class="ranked">
            Ranked Stats
            <table border="black">
                <tr>
                    <th>W/L</th><th>Kills</th><th>Deaths</th><th>Assists</th><th>CS</th>
                </tr>  
            <?php
            $result = LeagueDB::getInstance()->get_rankedStats_by_username($username);
                 while($row = mysqli_fetch_array($result)) {
                    if ($row['Win']) {
                        echo "<tr><td>W</td>";
                    }
                    else {
                      echo "<tr><td>L</td>"  ;
                    }
                    //echo "<tr><td>" . htmlentities($row['Win']) . "</td>";
                    echo "<td>" . htmlentities($row['Kills']) . "</td>";
                    echo "<td>" . htmlentities($row['Deaths']) . "</td>";
                    echo "<td>" . htmlentities($row['Assists']) . "</td>";
                    echo "<td>" . htmlentities($row['CS']) . "</td></tr>\n";
                }
            mysqli_free_result($result);
            ?>
            </table>
            <table border="black">
                <tr><th>Kill Average</th>
                <?php
                $username = $_GET['user'];    
                $result = LeagueDB::getInstance()->get_User_Ranked_Avg_Kills($username);
                    while($row = mysqli_fetch_array($result)) {
                        echo "<td>" . htmlentities($row['rAvgK']) . "</td></tr>\n";
                    }
                ?>
                <tr><th>Death Average</th>
                <?php
                $username = $_GET['user'];    
                $result = LeagueDB::getInstance()->get_User_Ranked_Avg_Deaths($username);
                    while($row = mysqli_fetch_array($result)) {
                        echo "<td>" . htmlentities($row['rAvgD']) . "</td></tr>\n";
                    }
                ?>    
            </table>
        </div>
        <div class="unranked">
            Unranked Stats
            <table border="black">
                <tr>
                    <th>W/L</th><th>Kills</th><th>Deaths</th><th>Assists</th><th>CS</th>
                </tr>  
            <?php
            $result = LeagueDB::getInstance()->get_normStats_by_username($username);
                 while($row = mysqli_fetch_array($result)) {
                    if ($row['Win']) {
                        echo "<tr><td>W</td>";
                    }
                    else {
                      echo "<tr><td>L</td>"  ;
                    }
                    //echo "<tr><td>" . htmlentities($row['Win']) . "</td>";
                    echo "<td>" . htmlentities($row['Kills']) . "</td>";
                    echo "<td>" . htmlentities($row['Deaths']) . "</td>";
                    echo "<td>" . htmlentities($row['Assists']) . "</td>";
                    echo "<td>" . htmlentities($row['CS']) . "</td></tr>\n";
                }
            mysqli_free_result($result);
            ?>
            </table>
            <table border="black">
                <tr><th>Kill Average</th>
                <?php
                $username = $_GET['user'];    
                $result = LeagueDB::getInstance()->get_User_unRanked_Avg_Kills($username);
                    while($row = mysqli_fetch_array($result)) {
                        echo "<td>" . htmlentities($row['uAvgK']) . "</td></tr>\n";
                    }
                ?>
                <tr><th>Death Average</th>
                <?php
                $username = $_GET['user'];    
                $result = LeagueDB::getInstance()->get_User_unRanked_Avg_Deaths($username);
                    while($row = mysqli_fetch_array($result)) {
                        echo "<td>" . htmlentities($row['uAvgD']) . "</td></tr>\n";
                    }
                ?>    
            </table>
        </div>
        <!-- back to main page--->
        <div class="dbbutton">
            <form name="backToMainPage" action="index.php">
            <input type="submit" value="Back To Main Page"/>
            </form>
        </div>
    </body>
</html>
