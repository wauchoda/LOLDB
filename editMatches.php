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
            $statChampIsEmpty = false;
            $statWinsIsEmpty = false;
            $statKillsIsEmpty = false;
            $statDeathsIsEmpty = false;
            $statAssistsIsEmpty = false;
            $statCSIsEmpty = false;
            $statRankedIsEmpty = false;
            if ($_SERVER['REQUEST_METHOD'] == "POST"){
                if (array_key_exists("back", $_POST)) {
                    header('Location: dashboard.php' ); 
                   exit;
                } else {
                    if ($_POST['Champ'] == "") {
                        $statChampNameIsEmpty = true;
                    }
                    if ($_POST['Win'] == "") {
                        $statWinsIsEmpty =  true;
                        echo ("Select Win or Loss");
                    } elseif ($_POST['Kills'] == "") {
                        $statKillsIsEmpty = true;
                        echo("Enter number of kills.");
                    } elseif ($_POST['Deaths'] == "") {
                        $statDeathsIsEmpty = true;
                        echo ("Enter number of deaths.");
                    } elseif ($_POST['Assists'] == "") {
                        $statAssistsIsEmpty = true;
                        echo ("Enter number of assists.");
                    } elseif ($_POST['CS'] == "") {
                        $statCSIsEmpty = true;
                        echo ("Enter number of CS.");
                    } elseif ($_POST["Ranked"] == "") {
                        $statRankedIsEmpty = true;
                        echo ("Was this game ranked or unranked?");
                    } else {
                       LeagueDB::getInstance()->insert_stats($_SESSION["user"], $_POST["Champ"], $_POST["Win"], $_POST["Kills"], $_POST["Deaths"], $_POST["Assists"], $_POST["CS"], $_POST["Ranked"]);
                       //redirects to editStats.php
                        header('Location: dashboard.php');
                       exit;
                    }
                }
            }
            
            if ($_SERVER["REQUEST_METHOD"] == "POST")
                $stats = array("Champ" => $_POST["Champ"],
                    "Win" => $_POST["Win"], 
                    "Kills" => $_POST["Kills"],
                    "Deaths" => $_POST["Deaths"],
                    "Assists" => $_POST["Assists"],
                    "CS" => $_POST["CS"],
                    "Ranked" => $_POST["Ranked"]);
            else
                $stats = array("Champ" => "",
                    "Win" => "", 
                    "Kills" => "",
                    "Deaths" => "",
                    "Assists" => "",
                    "CS" => "",
                    "Ranked" => "");
            ?> 
        
        <!-- allows user to see their last input on update stats--->
        <div id="editMatch">
            <form name="editMatch" action="editMatches.php" method="POST">
                Win or Loss? <select name="Win">
                    <option value="">Select...</option>
                    <option value="0">Loss</option>
                    <option value="1">Win</option>
                <?php echo $stats["Win"];?>"
                </select><br/>
                What Champion did you Play? <select name="Champ">
                    <option value="">Select Champ...</option>
                    <option value="Aatrox">Aatrox</option>
                    <option value="Ahri">Ahri</option>
                    <option value="Akali">Akali</option>
                    <option value="Alistar">Alistar</option>
                    <option value="Amumu">Amumu</option>
                    <option value="Anivia">Anivia</option>
                    <option value="Annie">Annie</option>
                    <option value="Ashe">Ashe</option>
                    <option value="Azir">Azir</option>
                    <option value="Bard">Bard</option>
                    <option value="Blitzcrank">Blitzcrank</option>
                    <option value="Brand">Brand</option>
                    <option value="Braum">Braum</option>
                    <option value="Caitlyn">Caitlyn</option>
                    <option value="Cassiopeia">Cassiopeia</option>
                    <option value="Cho'Gath">Cho'Gath</option>
                    <option value="Corki">Corki</option>
                    <option value="Darius">Darius</option>
                    <option value="Diana">Diana</option>
                    <option value="Dr. Mundo">Dr. Mundo</option>
                    <option value="Draven">Draven</option>
                    <option value="Ekko">Ekko</option>
                    <option value="Elise">Elise</option>
                    <option value="Evelynn">Evelynn</option>
                    <option value="Ezreal">Ezreal</option>
                    <option value="Fiddlesticks">Fiddlesticks</option>
                    <option value="Fiora">Fiora</option>
                    <option value="Fizz">Fizz</option>
                    <option value="Galio">Galio</option>
                    <option value="Gangplank">Gangplank</option>
                    <option value="Garen">Garen</option>
                    <option value="Gnar">Gnar</option>
                    <option value="Gragas">Gragas</option>
                    <option value="Graves">Graves</option>
                    <option value="Hecarim">Hecarim</option>
                    <option value="Heimerdinger">Heimerdinger</option>
                    <option value="Illaoi">Illaoi</option>
                    <option value="Irelia">Irelia</option>
                    <option value="Janna">Janna</option>
                    <option value="Jarvan IV">Jarvan IV</option>
                    <option value="Jax">Jax</option>
                    <option value="Jayce">Jayce</option>
                    <option value="Jinx">Jinx</option>
                    <option value="Kalista">Kalista</option>
                    <option value="Karma">Karma</option>
                    <option value="Karthus">Karthus</option>
                    <option value="Kassadin">Kassadin</option>
                    <option value="Katarina">Katarina</option>
                    <option value="Kayle">Kayle</option>
                    <option value="Kennen">Kennen</option>
                    <option value="Kha'Zix">Kha'Zix</option>
                    <option value="Kindred">Kindred</option>
                    <option value="Kog'Maw">Kog'Maw</option>
                    <option value="LeBlanc">LeBlanc</option>
                    <option value="Lee Sin">Lee Sin</option>
                    <option value="Leona">Leona</option>
                    <option value="Lissandra">Lissandra</option>
                    <option value="Lucian">Lucian</option>
                    <option value="Lulu">Lulu</option>
                    <option value="Lux">Lux</option>
                    <option value="Malphite">Malphite</option>
                    <option value="Malzahar">Malzahar</option>
                    <option value="Maokai">Maokai</option>
                    <option value="Master Yi">Master Yi</option>
                    <option value="Miss Fortune">Miss Fortune</option>
                    <option value="Mordekaiser">Mordekaiser</option>
                    <option value="Morgana">Morgana</option>
                    <option value="Nami">Nami</option>
                    <option value="Nasus">Nasus</option>
                    <option value="Nautilus">Nautilus</option>
                    <option value="Nidalee">Nidalee</option>
                    <option value="Nocturne">Nocturne</option>
                    <option value="Nunu">Nunu</option>
                    <option value="Olaf">Olaf</option>
                    <option value="Orianna">Orianna</option>
                    <option value="Pantheon">Pantheon</option>
                    <option value="Poppy">Poppy</option>
                    <option value="Quinn">Quinn</option>
                    <option value="Rammus">Rammus</option>
                    <option value="Rek'Sai">Rek'Sai</option>
                    <option value="Renekton">Renekton</option>
                    <option value="Rengar">Rengar</option>
                    <option value="Riven">Riven</option>
                    <option value="Rumble">Rumble</option>
                    <option value="Ryze">Ryze</option>
                    <option value="Sejuani">Sejuani</option>
                    <option value="Shaco">Shaco</option>
                    <option value="Shen">Shen</option>
                    <option value="Shyvana">Shyvana</option>
                    <option value="Singed">Singed</option>
                    <option value="Sion">Sion</option>
                    <option value="Sivir">Sivir</option>
                    <option value="Skarner">Skarner</option>
                    <option value="Sona">Sona</option>
                    <option value="Soraka">Soraka</option>
                    <option value="Swain">Swain</option>
                    <option value="Syndra">Syndra</option>
                    <option value="Tahm Kench">Tahm Kench</option>
                    <option value="Talon">Talon</option>
                    <option value="Taric">Taric</option>
                    <option value="Teemo">Teemo</option>
                    <option value="Thresh">Thresh</option>
                    <option value="Tristana">Tristana</option>
                    <option value="Trundle">Trundle</option>
                    <option value="Tryndamere">Tryndamere</option>
                    <option value="Twisted Fate">Twisted Fate</option>
                    <option value="Twitch">Twitch</option>
                    <option value="Udyr">Udyr</option>
                    <option value="Urgot">Urgot</option>
                    <option value="Varus">Varus</option>
                    <option value="Vayne">Vayne</option>
                    <option value="Veigar">Veigar</option>
                    <option value="Vel'Koz">Vel'Koz</option>
                    <option value="Vi">Vi</option>
                    <option value="Viktor">Viktor</option>
                    <option value="Vladimir">Vladimir</option>
                    <option value="Volibear">Volibear</option>
                    <option value="Warwick">Warwick</option>
                    <option value="Wukong">Wukong</option>
                    <option value="Xerath">Xerath</option>
                    <option value="Xin Zhao">Xin Zhao</option>
                    <option value="Yasuo">Yasuo</option>
                    <option value="Yorick">Yorick</option>
                    <option value="Zac">Zac</option>
                    <option value="Zed">Zed</option>
                    <option value="Ziggs">Ziggs</option>
                    <option value="Zilean">Zilean</option>
                    <option value="Zyra">Zyra</option>
                    <?php echo $stats["Champ"];
                    //December 3rd, finished options. need to add champion to match history and to editMatches.php.
                    ?>
                </select><br/>
                How many kills did you have? <input type="text" name="Kills" value="<?php echo $stats["Kills"];?>"/><br/>
                How many deaths did you have? <input type="text" name="Deaths" value="<?php echo $stats["Deaths"];?>"/><br/>
                How many assists did you have? <input type="text" name="Assists" value="<?php echo $stats["Assists"];?>"/><br/>
                How much cs did you have? <input type="text" name="CS" value="<?php echo $stats["CS"];?>"/><br/>
                Was this game ranked? <select name="Ranked">
                    <option value="">Select...</option>
                    <option value="0">Unranked</option>
                    <option value="1">Ranked</option>
                    <?php
                        echo $stats["Ranked"];
                    ?>
                </select>
        </div>
            <input type="submit" name="saveMatch" value="Save Changes"/>
            <input type="submit" name="back" value="Back to Dashboard"/>
        </form>
    </body>
</html> 
