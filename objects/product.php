<?php
class Product
{
   // database connectie en tabel-naam
   private $conn;
   private $table_name = "product";
   // object properties
   public $id;
   // constructor with $db as database connection
   public function __construct($db)
   {
       $this->conn = $db;
   }
   // read products
    function read($id = null) {
        if($id == null) {
            $where = "";
        }else {
            $where = " WHERE id = " . $id;
        }
       // select all query
       $query = "SELECT * FROM " . $this->table_name . $where;
       $result = $this->conn->query($query);
       return $result;
   }
   
    function delete($id) {
       $query = "DELETE FROM " . $this->table_name . " Where id=" . $id;
       $result = $this->conn->query($query);
       return $result;
   }

    function create($naam, $beschrijving, $prijs, $categorie) {
        $query = "INSERT INTO " . $this->table_name .
                "(`naam`,`beschrijving`,`prijs`,`categorie_id`,`toegevoegd_op`) " .
                "VALUES ('$naam','$beschrijving','$prijs','$categorie',now())";
        
        if($this->conn->query($query) === TRUE){
            return true;
        }else{
            return false;
        }
        return $result;
   }

   function search($val){
        $query = "SELECT * FROM " . $this->table_name . "WHERE naam LIKE '$val%' ORDER BY naam";
   }
}