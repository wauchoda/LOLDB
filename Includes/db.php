<?php
    class LeagueDB extends mysqli {
        
        //single instance of self shared among all instances
        private static $instance = null;
        
        // db connection config variables
        private $user = 'root';
        private $pass = '';
        private $dbName = 'leaguedb';
        private $dbHost = 'localhost';
        
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
        
        public function get_user_id_by_username($username) {

            $username = $this->real_escape_string($username);

            $user = $this->query("SELECT id FROM user WHERE username = '"

                    . $username . "'");
            if ($username->num_rows > 0){
                $row = $username->fetch_row();
                return $row[0];
            } else
                return null;
        }
        public function get_stats_by_user_id($userID) {
            return $this->query("SELECT id, username, wins, losses, kills, deaths, assists FROM stats WHERE id=" . $userID);
        }
        public function create_user ($username, $password){
            $username = $this->real_escape_string($username);
            $password = $this->real_escape_string($password);
            $this->query("INSERT INTO user (username, password) values ('" . $username . "', '" . $password . "')");
        }
    }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

