<?php
class Database{
   // Database instellingen
   private $host = "localhost";
   private $db_name = "u533473_api";
   private $username = "u533473_root";
   private $password = "EC3MhWRR";
   public $conn;
   public function getConnection(){
       $this->conn = null;
       try
{
   $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
}
catch(Exception $e)
{
   echo "Fout tijdens verbinden: " . $e->getMessage();
}
       return $this->conn;
   }
}