<?php

    class ConnectDb {
        private $host;
        private $user;
        private $pass;
        private $db;

        public function __construct($host, $user, $pass, $db) {
            $this->host = $host;
            $this->user = $user;
            $this->pass = $pass;
            $this->db = $db;
        }
        
        public function connect() {
            // Create connection
            $conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
            
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            // echo "Connected successfully";

            return $conn;
            // mysqli_close($conn);
        }

    }