<?php
class Database{


  private $db = array(
        'host' => 'localhost',
        'user' => 'root',
        'password' =>'',
        'database' =>'mailing_new'
    );
    
     public $con;
     public function __construct() {
         
         $this->con = new mysqli($this->db['host'],$this->db['user'],$this->db['password'],$this->db['database']);
         
         if ($this->con->connect_error) {
                die("Connection failed: " . $this->con->connect_error);
         }
     }
 }
 
 $obj = new Database;