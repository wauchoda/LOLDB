<?php
    
    class LeagueDB extends mysqli {
        
        //single instance of self shared among all instances
        private static $instance = null;
        
        // db connection config variables
        private $user = 'root';
        private $pass = '';
        private $dbName = 'loldb';
        private $dbHost = 'localhost:3306';
        
        //This method must be static, and must return an instance of the object if the object
        //does not already exist.
        public static function getInstance() {
          if (!self::$instance instanceof self) {
            self::$instance = new self;
          }
          return self::$instance;
        }

        // The clone and wakeup methods prevents external instantiation of copies of the Singleton class,
        // thus eliminating the possibility of duplicate objects.
        public function __clone() {
          trigger_error('Clone is not allowed.', E_USER_ERROR);
        }
        public function __wakeup() {
          trigger_error('Deserializing is not allowed.', E_USER_ERROR);
        }
        
        // private constructor
        private function __construct() {
            parent::__construct($this->dbHost, $this->user, $this->pass, $this->dbName);
            if (mysqli_connect_error()) {
                exit('Connect Error (' . mysqli_connect_errno() . ') '
                        . mysqli_connect_error());
            }
            parent::set_charset('utf-8');
        }
        
        //selects user name via users id
        public function get_user_id_by_username($username) {

            $username = $this->real_escape_string($username);

            $user = $this->query("SELECT uid FROM user WHERE username = '"

                    . $username . "'");
            if ($user->num_rows > 0){
                $row = $user->fetch_row();
                return $row[0];
            } else
                return null;
        }
        
        //selects id information for user
        public function get_matchHist_by_username($username) {
            return $this->query("SELECT champName, Win, Kills, Deaths, Assists, CS FROM matchHist WHERE username = '$username'");
        }
        
        public function get_rankedStats_by_username($username) {
            return $this->query("SELECT champName, Win, Kills, Deaths, Assists, CS FROM matchHist WHERE username = '$username' and ranked = TRUE");
        }
        public function get_normStats_by_username($username) {
            return $this->query("SELECT champName, Win, Kills, Deaths, Assists, CS FROM matchHist WHERE username = '$username' and ranked = False");
        }
        
        //creates new user at sign up and adds to MySQL table
        public function create_user ($username, $email, $password){
            $username = $this->real_escape_string($username);
            $email = $this->real_escape_string($email);
            $password = $this->real_escape_string($password);
            
            //creates new user via insert statement
            //$this->query("INSERT INTO user (username, email, password) values ('" . $username . "', '" . $email . "', '" . $password . "')");
            
            //below is the call of a stored procedure, sp_createUser. This gets a bonus on the project grade! 
            //above the previous comment is the standard PHP incase this stored proc breaks.
            $con = mysql_connect('localhost', 'root');
            mysql_select_db('loldb');
            $result = mysql_query("CALL sp_createUser('$username', '$email', '$password');") or die(mysql_error());
        }
        
        //function to check username/password upon login attempt.
        //if user/pass match returns true, else returns false.
        public function verify_user_credentials ($username, $password) {
            $username = $this->real_escape_string($username);
            
            $password = $this->real_escape_string($password);
            $result = $this->query("select 1 from user where username = '" . $username . "' and password = '" . $password . "'");
            return $result->data_seek(0);
                                   
        }
        
        //insert new stats to database
        //create insert to database function that accepts username from session
        function insert_stats($username, $champName, $win, $kills, $deaths, $assists, $cs, $ranked){
            //$username = $_SESSION['user'];
            $champName = $this->real_escape_string($champName);
            $win = $this->real_escape_string($win);
            $kills = $this->real_escape_string($kills);
            $deaths = $this->real_escape_string($deaths);
            $assists = $this->real_escape_string($assists);
            $cs = $this->real_escape_string($cs);
            $ranked = $this->real_escape_string($ranked);
            //SQL Update clause for users stats
            //$this->query("UPDATE stats SET wins = '$wins', losses = '$losses', kills = '$kills', deaths = '$deaths', assists = '$assists' WHERE username = '$username'");
            $this->query("INSERT INTO matchHist (username, champName, win, kills, deaths, assists, cs, ranked) "
                    . "SELECT '$username', '$champName', '$win', '$kills', '$deaths', '$assists', '$cs', '$ranked'");
        }
        
        //score AVG function below
        public function get_User_Avg_Kills($username) {
            $username = $this->real_escape_string($username);
            $result = $this->query("select AVG(Kills) as AvgK from matchHist WHERE username = '$username'");
            return $result;
        }
        public function get_User_Ranked_Avg_Kills($username) {
            $username = $this->real_escape_string($username);
            $result = $this->query("select AVG(Kills) as rAvgK from matchHist WHERE username = '$username' and ranked = true");
            return $result;
        }
        public function get_User_unRanked_Avg_Kills($username) {
            $username = $this->real_escape_string($username);
            $result = $this->query("select AVG(Kills) as uAvgK from matchHist WHERE username = '$username' and ranked = false");
            return $result;
        }
        public function get_User_Avg_Deaths($username) {
            $username = $this->real_escape_string($username);
            $result = $this->query("select AVG(Deaths) as AvgD from matchHist WHERE username = '$username'");
            return $result;
        }
        public function get_User_Ranked_Avg_Deaths($username) {
            $username = $this->real_escape_string($username);
            $result = $this->query("select AVG(Deaths) as rAvgD from matchHist WHERE username = '$username' and ranked = true");
            return $result;
        }
        public function get_User_unRanked_Avg_Deaths($username) {
            $username = $this->real_escape_string($username);
            $result = $this->query("select AVG(Deaths) as uAvgD from matchHist WHERE username = '$username' and ranked = false");
            return $result;
        }
        public function get_User_Avg_Assists($username) {
            $username = $this->real_escape_string($username);
            $result = $this->query("select AVG(Assists) as AvgA from matchHist WHERE username = '$username'");
            return $result;
        }
    }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

