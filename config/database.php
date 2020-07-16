<?php 
    // Used to establish MYSQL Database Connection
    class Database {
        // Specifying DB credentials
        private $host = "localhost";
        private $db_name = "tech_navi";
        private $username = "root";
        private $password = "";
        private $conn;

        function __construct() {
            $this->conn = $this->connectDB();
        }

        function connectDB() {
            $conn = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
            return $conn;
        }

        function runQuery($query) {
            $result = mysqli_query($this->conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $resultset[] = $row;
            }
            if(!empty($resultset)) {
                return $resultset;
            }
        }

        function insertQuery($query) {
            if (mysqli_query($this->conn, $query)) {
                return true;
            } else {
                return false;
            }
        }

        function numRows($query) {
            $result = mysqli_query($this->conn, $query);
            $rowcount = mysqli_num_rows($result);
            return $rowcount;
        }
    }
?>