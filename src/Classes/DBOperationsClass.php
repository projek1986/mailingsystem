<?php

include __DIR__ .'/../../settings/Db.php';

class DataOperation extends Database{
    
    public function my_query($sql){
      
        $query = mysqli_query($this->con,$sql);
        
        if($query = mysqli_query($this->con,$sql)){
            return $query;
        }else{
            return null;
        }
        $this->con->close();
    }
    
    public function insert_record($table, $fields) {
        
        $sql = "";
        $sql .= "INSERT INTO ".$table;     
        $sql .= " (". implode(", ",array_keys($fields)).") VALUES ";
        $sql .= "('".implode("', '", array_values($fields))."')"; 
//        echo $sql;
//        die();
        if(mysqli_query($this->con,$sql)){
            return true;
        }
        $this->con->close();
    }
    
    public function insert_record_where($table, $where, $fields) {
        
        foreach ($where as $key => $value){
            $condition = $key. " = '" .$value ."' AND ";
        }        
        $condition = substr($condition, 0, -5);
        
        $sql = "";
        $sql .= "INSERT INTO ".$table;     
        $sql .= " (". implode(", ",array_keys($fields)).") VALUES ";
        $sql .= "('".implode("', '", array_values($fields))."') WHERE ".$condition;
//        echo $sql;
//        die();
        if(mysqli_query($this->con,$sql)){
            return true;
        }
        $this->con->close();
    }
    
    public function fetch_record($table) {
        
        $sql = "SELECT * FROM ".$table;
//        echo $sql;
//        die();
        $array = array();
        $query = mysqli_query($this->con, $sql);
        
        while($row = mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
        $this->con->close();
    }
    
    public function select_record($table, $where){
        
        $sql = "";
        $condition = "";
      
        foreach ($where as $key => $value){
            //id = '5' AND m_name ='something
            $condition .= $key. "= '" .$value ."' AND ";
        }        
        $condition = substr($condition, 0, -5);
  
        $sql .= "SELECT * FROM ".$table." WHERE ".$condition;
//             echo $sql;
//        die();
        $query = mysqli_query($this->con,$sql);
        $row = mysqli_fetch_array($query);
        
        return $row;
        $this->con->close();
    }
    
    public function select_records($table, $where){
        
        $sql = "";
        $condition = "";
      
        foreach ($where as $key => $value){
            //id = '5' AND m_name ='something
            $condition .= $key. " = '" .$value ."' AND ";
        }        
        $condition = substr($condition, 0, -5);
  
        $sql .= "SELECT * FROM ".$table." WHERE ".$condition;
//        var_dump($sql);
//        die();
        $array = array();
        $query = mysqli_query($this->con, $sql);
        
        while($row = mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
        $this->con->close();
    }
    
    public function select_distinct_records($table, $where, $group_by){
        
        $sql = "";
        $condition = "";
      
        foreach ($where as $key => $value){
            //id = '5' AND m_name ='something
            $condition .= $key. " = '" .$value ."' AND ";
        }        
        $condition = substr($condition, 0, -5);
  
        $sql .= "SELECT * FROM ".$table." WHERE ".$condition." GROUP BY ".$group_by;
//        var_dump($sql);
//        die();
        $array = array();
        $query = mysqli_query($this->con, $sql);
        
        while($row = mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
        $this->con->close();
    }
    
    
    
    public function select_records_limit($table, $where,$limit){

        $sql = "";
        $condition = "";
      
        foreach ($where as $key => $value){
            //id = '5' AND m_name ='something
            $condition .= $key. "= '" .$value ."' AND ";
        }        
        $condition = substr($condition, 0, -5);
  
        $sql .= "SELECT * FROM ".$table." WHERE ".$condition." LIMIT ".$limit;
//        echo $sql;
//        die();
        $array = array();
        $query = mysqli_query($this->con, $sql);
        
        while($row = mysqli_fetch_assoc($query)){
            $array[] = $row;
        }
        return $array;
        $this->con->close();
    }
    
    public function update_record($table, $where, $fields){
        
        $sql = "";
        $condition ="";
        
        foreach ($where as $key => $value){
            $condition .= $key . "= '" .$value. "' AND ";
        }
        $condition = substr($condition, 0, -4);
        
        foreach ($fields as $key => $value){
            $sql .= $key . "='".$value."', ";
        }
        $sql = substr($sql, 0, -2);
        $sql = "UPDATE ".$table. " SET ".$sql." WHERE ".$condition;
        
        if(mysqli_query($this->con,$sql)){
            return true;            
        }
        $this->con->close();
    }
    
    public function delete_record($table, $where){
        $sql = "";
        $condition = "";
        foreach($where as $key => $value){
            $condition .= $key ." ='".$value."' AND ";
        }
        $condition = substr($condition, 0,-5);
        $sql = "DELETE FROM ".$table. " WHERE ".$condition;
        
        if(mysqli_query($this->con,$sql)){
            return true;            
        }
        $this->con->close();
   }
   
    public function get_max_id($table){

        $sql = "SELECT Max(id) FROM $table";
//        echo $sql;
//        die();
        $result = mysqli_query($this->con,$sql);

        if ($result->num_rows > 0) {

                $MAX = $result->fetch_assoc();
                return $max = $MAX ['Max(id)'];
        }else{
            return null;
        }
        $this->con->close();
    }
    
    public function min_sanityzation($text){
        $text = str_replace("'", "&#039;", $text);
//        $text = str_replace(">", "&gt;", $text);
//        $text = str_replace("<", "&lt;", $text);
        return $text;
   
    }
}

