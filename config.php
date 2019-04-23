<?php
class dbconnect{
        private $db_host = "localhost";
        private $db_user = "root";
        private $db_pass = "";
        private $db_name = "sipm_db";
        
        public function connect(){
            try {    
                //create PDO connection 
                $db = new PDO('mysql:host=' . $this->db_host . ';dbname=' . $this->db_name, $this->db_user, $this->db_pass);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $db;
            } catch(PDOException $e) {
                //show error
                die("Terjadi masalah: " . $e->getMessage());
            }
        }


// $con=mysqli_init(); 
// mysqli_ssl_set($con, NULL, NULL, {ca-cert filename}, NULL, NULL); 
// mysqli_real_connect($con, $db_host, $db_user, $db_pass, $db_name, 3306);
}
