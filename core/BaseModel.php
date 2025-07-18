<?php

namespace Core;
include_once __DIR__ . '/Database.php';

use Core\Database;

class BaseModel
{
    public $tbl = null;
    public $db;
    public function __construct($tbl){
      $this->db = Database::getInstance()->getConnection();
      $this->tbl = $tbl;
    }

    public function all()
    {
        // need to check : prevent sql injection

        $result = $this->db->query("SELECT * FROM {$this->tbl}");

        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        return $users;
    }

    public function findById($id)
    {
        // need to check : prevent sql injection
        $result = $this->db->query("SELECT * FROM {$this->tbl} WHERE id = $id");

        return $result->fetch_assoc(); 
    }

    public function create($data){
      $keys = implode(',', array_keys($data));
      $questionMark = implode(',', array_fill(0, count($data), '?'));
      // prevent sql injection
      $this->db->execute_query("INSERT INTO {$this->tbl} ($keys) VALUES ($questionMark)", array_values($data));
      return $this->db->insert_id;
    }

    public function findFirst($data){
      $stm = "SELECT * FROM {$this->tbl} WHERE 1 = 1";
      $keyValue = [];
      foreach($data as $k => $value){
        // $stm .= " AND $k = ?";
        $stm .= " AND $k = ?";
        $keyValue[] = $value;
      }

      $stm .= " LIMIT 1";

      // $query = $this->db->query($stm)->fetch_assoc();

      // prevent sql injection
      $query = $this->db->execute_query($stm, $keyValue)->fetch_assoc();

      return $query ? (object) $query : null;
    }

    public function update($id, $data){
      $stm = "UPDATE {$this->tbl} SET ";
      foreach ($data as $key => $value) {
        $stm .= " $key = '$value'";
        if($key != array_key_last($data)){
          $stm .= ",";
        }
      }

      $stm .= " WHERE id = $id";
      // need to check : prevent sql injection
      $this->db->query($stm);
      return true;
    }

    public function delete($id){

      // need to check : prevent sql injection
      $this->db->query("DELETE FROM {$this->tbl} WHERE id = $id");
      return true;
    }

    public function belongsTo($model,$primary_key,$foreign_key, $select){
      $main_table = $this->tbl;
      $foreign_table = $model.tbl;

      $query = "
        SELECT {$select} FROM {$main_table} 
        INNER JOIN {$foreign_table}
        ON {$foreign_key} = {$primary_key};
      ";
      // need to check : prevent sql injection
      $fetch = $this->db->query($query);

      return $fetch->fetch_assoc();
    }
}
