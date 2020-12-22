<?php
    class Database {
        private $host = "www.doctorsarch.org";
        private $db_name = "accounts";
        private $password = "accounts.doctorsarch";
        private $username = "doctorsa";
        private $conn;

        public function connect() {
            $this->conn = null;

            try {
                $this->conn = new PDO("mysql:host=".$this->host.';dbname='.$this->db_name, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Connection Error: '. $e->getMessage();
            }

            return $this->conn;
        }
    }