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
        <link href="stats.css" type="stats/css" rel="stylesheet" media="all" />
        <meta charset="UTF-8">
        <title></title>
    </head>
    <header>
           <div class="Update">
                <form name ="addNewMatch" action="editMatches.php">
                    <input type="submit" value="Update Match History">
                </form>
            </div>
            <div class="back">    
                <!-- return to index page--->
                <form name="backToMainPage" action="index.php">
                <input type="submit" value="Back To Main Page"/>
                </form>
            </div>
            <div class="logout">
                <form name="LogOut" action="index.php">
                    <!--<input type="submit" value="Log Out"/>--->
                    <a href="logout.php" >Logout</a>
                </form>
            </div>
    </header>
    <body>
        <div class="welcome">
            Your Match History
        </div>
       
        <div class="table">
            <table border="black">
                <tr><th>Champion</th><th>W/L</th><th>Kills</th><th>Deaths<th>Assists</th><th>CS</th></tr>
                <?php
                require_once("Includes/db.php");
                //$userID = LeagueDB::getInstance()->get_user_id_by_username($_SESSION["user"]);
                $username = $_SESSION["user"];
                $result = LeagueDB::getInstance()->get_matchHist_by_username($username);
                if ($result === FALSE) {
                    echo mysql_error();
                }
                while($row = mysqli_fetch_array($result)) {
                    echo "<tr><td>" . htmlentities($row['champName']) . "</td>";
                    if ($row['Win']) {
                        echo "<td>W</td>";
                    }
                    else {
                      echo "<td>L</td>"  ;
                    }
                    //echo "<tr><td>" . htmlentities($row['Win']) . "</td>";
                    echo "<td>" . htmlentities($row['Kills']) . "</td>";
                    echo "<td>" . htmlentities($row['Deaths']) . "</td>";
                    echo "<td>" . htmlentities($row['Assists']) . "</td>";
                    echo "<td>" . htmlentities($row['CS']) . "</td></tr>\n";
                }
                ?>
            </table>
        </div>
        <div class="averages">
            Your Per Game Averages
            <div class="kAvg">
                <table border="black">
                    <tr><th>Kill Average</th></tr>
                    <?php
                    $username = $_SESSION['user'];    
                    $result = LeagueDB::getInstance()->get_User_Avg_Kills($username);
                        while($row = mysqli_fetch_array($result)) {
                            echo "<tr><td>" . htmlentities($row['AvgK']) . "</td></tr>\n";
                        }
                        //echo "<tr><td>" . mysql_query("select AVG(Kills) from matchHist WHERE username = '$username'") . "</td></tr>\n";
                    ?>
                </table>
            </div>
            <div class="dAvg">
                <table border="black">
                    <tr><th>Death Average</th></tr>
                    <?php
                    $username = $_SESSION['user'];    
                    $result = LeagueDB::getInstance()->get_User_Avg_Deaths($username);
                        while($row = mysqli_fetch_array($result)) {
                            echo "<tr><td>" . htmlentities($row['AvgD']) . "</td></tr>\n";
                        }
                        //echo "<tr><td>" . mysql_query("select AVG(Kills) from matchHist WHERE username = '$username'") . "</td></tr>\n";
                    ?>
                </table>
            </div>
            <div class="aAvg">
                <table border="black">
                    <tr><th>Assist Average</th></tr>
                    <?php
                    $username = $_SESSION['user'];    
                    $result = LeagueDB::getInstance()->get_User_Avg_Assists($username);
                        while($row = mysqli_fetch_array($result)) {
                            echo "<tr><td>" . htmlentities($row['AvgA']) . "</td></tr>\n";
                        }
                        //echo "<tr><td>" . mysql_query("select AVG(Kills) from matchHist WHERE username = '$username'") . "</td></tr>\n";
                    ?>
                </table>
            </div>
        </div>        
    </body>
</html>
