<?php

namespace Core;
include_once __DIR__ . '/Database.php';

use Core\Database;

class BaseModel
{
    public $tbl = null;
    protected $db;
    public function __construct($tbl){
      $this->db = Database::getInstance()->getConnection();
      $this->tbl = $tbl;
    }

    public function all()
    {
        $result = $this->db->query("SELECT * FROM {$this->tbl}");

        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        return $users;
    }

    public function findById($id)
    {
        $result = $this->db->query("SELECT * FROM {$this->tbl} WHERE id = $id");

        return $result->fetch_assoc(); 
    }

    public function create($data){
      $keys = implode(',', array_keys($data));
      $values = implode(',', array_values($data));
      $this->db->query("INSERT INTO {$this->tbl} ($keys) VALUES ($values)");
      return $this->db->insert_id;
    }

    public function findFirst($data){
      $stm = "SELECT * FROM {$this->tbl} WHERE 1 = 1";
      foreach($data as $k => $value){
        $stm .= " AND $k = '$value'";
      }

      $stm .= " LIMIT 1";
      $query = $this->db->query($stm)->fetch_assoc();

      return $query ? (object) $query : null;
    }

    public function update($id, $data){
      $keys = implode(',', array_keys($data));
      $values = implode(',', array_values($data));
      $this->db->query("UPDATE {$this->tbl} SET $keys = $values WHERE id = $id");
      return true;
    }

    public function delete($id){
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

      $fetch = $this->db->query($query);

      return $fetch->fetch_assoc();
    }
}
