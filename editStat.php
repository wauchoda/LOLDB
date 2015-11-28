<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
    <head>

       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
            <?php 
            //receive session data. if user is not logged on redirect
            session_start();
            if (!array_key_exists("user", $_SESSION)) {
                header('Location: index.php');
                exit;
            }
            
            require_once ("Includes/db.php");
            //$userID = LeagueDB::getInstance()->get_user_id_by_username($_SESSION['user']);
            //echo ($_SESSION['user']); test print of user name <-
            $username = ($_SESSION["user"]);
            $statWinsIsEmpty = false;
            $statLossesIsEmpty = false;
            $statKillsIsEmpty = false;
            $statDeathsIsEmpty = false;
            $statAssistsIsEmpty = false;
            if ($_SERVER['REQUEST_METHOD'] == "POST"){
                if (array_key_exists("back", $_POST)) {
                    header('Location: editStats.php' ); 
                   exit;
                } else {
                    if ($_POST['wins'] == "") {
                        $statWinsIsEmpty =  true;
                        echo ("Enter number of wins.");
                    } elseif ($_POST['losses'] == "") {
                        $statLossesIsEmpty = true;
                        echo("Enter number of losses.");
                    } elseif ($_POST['kills'] == "") {
                        $statKillsIsEmpty = true;
                        echo ("Enter number of kills.");
                    } elseif ($_POST['deaths'] == "") {
                        $statDeathsIsEmpty = true;
                        echo ("Enter number of deaths.");
                    } elseif ($_POST['assists'] == "") {
                        $statAssistsIsEmpty = true;
                        echo ("Enter number of assists.");
                    } else {      
                       LeagueDB::getInstance()->insert_stats($_SESSION['user'], $_POST["wins"], $_POST["losses"], $_POST["kills"], $_POST["deaths"], $_POST["assists"]);
                       //disabled to test insert into stats functionn in db.php
                       //redirects to editStats.php
                        header('Location: editStats.php');
                       exit;
                    }
                }
            }
            
            if ($_SERVER["REQUEST_METHOD"] == "POST")
                $stats = array("wins" => $_POST["wins"], 
                "losses" => $_POST["losses"],
                    "kills" => $_POST["kills"],
                    "deaths" => $_POST["deaths"],
                    "assists" => $_POST["assists"]);
            else
                $stats = array("wins" => "", 
                "losses" => "",
                    "kills" => "",
                    "deaths" => "",
                    "assists" => "");
            ?> 
        
        <!-- allows user to see their last input on update stats--->
        <form name="editStat" action="editStat.php" method="POST">
            How many games have you won? <input type="text" name="wins" value="<?php echo $stats["wins"];?>" /><br/>
            How many games have you lost? <input type="text" name="losses" value="<?php echo $stats["losses"];?>"/><br/>
            How many kills do you have? <input type="text" name="kills" value="<?php echo $stats["kills"];?>"/><br/>
            How many deaths do you have? <input type="text" name="deaths" value="<?php echo $stats["deaths"];?>"/><br/>
            How many assists do you have? <input type="text" name="assists" value="<?php echo $stats["assists"];?>"/><br/>

            <input type="submit" name="saveStats" value="Save Changes"/>
            <input type="submit" name="back" value="Back to Your Stats"/>
        </form>
    </body>
</html> 
