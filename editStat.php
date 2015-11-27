<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
    <head>

       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
            <?php 
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
        <!-- this is where Levi left of on 11/26/2015 --->
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
