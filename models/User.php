<?php
    class User {
        //DB stuff
        private $conn;
        private $table = "users";

        // Properties
        public $id;
        public $username;
        public $password;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function read() {
            // Create query
            $query = "SELECT
                id, 
                name, 
            FROM " . $this->table . "
            WHERE username = :username AND password = :password";

            // Prepare statement
            $stmt = $this->conn->prepare($stmt);

            // Clean data
            $this->username = htmlspecialchars(strip_tags($this->username));
            $this->password = htmlspecialchars(strip_tags($this->password));

            // Bind parameters
            $stmt->bindParam(":username", $this->username);
            $stmt->bindParam(":password", $this->password);

            if ($stmt->execute()) {
                return true;
            }

            printf("Error: $s.\n", $stmt->error);
            return false;
        }

        public function create_user() {
            $query = "INSERT INTO " .$this->table. "
            SET username = :username, password = :password";

            // Prepare query
            $stmt = $this->conn->prepare($query);

            // Clean data =
            $this->username = htmlspecialchars(strip_tags($this->username));
            $this->password = htmlspecialchars(strip_tags($this->password));

            // Bind data 
            $stmt->bindParam(":username", $this->username);
            $stmt->bindParam(":password", $this->password);

            // Execute query
            if ($stmt->execute()) {
                return true;
            }
            
            printf("Error: $s.\n", $stmt->error);
            return false;
        }
    }