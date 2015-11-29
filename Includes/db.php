<?php
    
    class LeagueDB extends mysqli {
        
        //single instance of self shared among all instances
        private static $instance = null;
        
        // db connection config variables
        private $user = 'root';
        private $pass = '';
        private $dbName = 'leaguedb';
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

            $user = $this->query("SELECT id FROM user WHERE username = '"

                    . $username . "'");
            if ($user->num_rows > 0){
                $row = $user->fetch_row();
                return $row[0];
            } else
                return null;
        }
        
        //selects id information for user
        public function get_stats_by_user_id($userID) {
            return $this->query("SELECT id, username, wins, losses, kills, deaths, assists FROM stats WHERE id=" . $userID);
        }
        
        //creates new user at sign up and adds to MySQL table
        public function create_user ($username, $password){
            $username = $this->real_escape_string($username);
            $password = $this->real_escape_string($password);
            
            //$this->query("CALL create_new_user($username, $password)");
            //creates new user via insert statement
            //we can replace the below to lines with a single MySQL stored procedure for a 20% bonus on the grade.
            $this->query("INSERT INTO user (username, password) values ('" . $username . "', '" . $password . "')");
            $this->query("INSERT INTO stats (username, wins, losses, kills, deaths, assists) VALUES ('$username', '0', '0', '0', '0', '0')");
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
        function insert_stats($username, $wins, $losses, $kills, $deaths, $assists){
            //$username = $_SESSION['user'];
            $wins = $this->real_escape_string($wins);
            $losses = $this->real_escape_string($losses);
            $kills = $this->real_escape_string($kills);
            $deaths = $this->real_escape_string($deaths);
            $assists = $this->real_escape_string($assists);
            //SQL Update clause for users stats
            $this->query("UPDATE stats SET wins = '$wins', losses = '$losses', kills = '$kills', deaths = '$deaths', assists = '$assists' WHERE username = '$username'");
            //$this->query("INSERT INTO stats (username, wins, loses, kills, deaths, assists
                            //SELECT '$username', '$wins', '$losses', '$kills', '$deaths', '$assists'");
        }
        
    }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

