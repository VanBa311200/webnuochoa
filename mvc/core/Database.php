<?php
    class Database {
        protected $servername = "localhost";
        protected $username = "root";
        protected $password = "";
        protected $databasename = "webnuochoa";
        protected $con;


        public function __construct() {
            $this->con = mysqli_connect($this->servername, $this->username, $this->password);
            mysqli_select_db($this->con, $this->databasename);
            mysqli_set_charset($this->con, 'utf8');

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }
        }
    }

?>