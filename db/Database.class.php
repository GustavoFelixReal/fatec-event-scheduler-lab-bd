<?php
require '../utils/db.php';

class Database
{
  private $conn;
  private $utils;

  public function __construct($connection)
  {
    $this->conn = $connection;
    $this->utils = new DBUtils();
  }

  public function execute($query)
  {
    return $this->conn->query($query);
  }

  public function insert($values, $table)
  {
    $query = "INSERT INTO $table (" . $this->utils->serialize_fields($values) . ") VALUES (" . $this->utils->serialize_values($values) . ");";

    return $this->execute($query);
  }

  public function update($fields, $table, $where = "")
  {
    $query = "UPDATE $table SET " . $this->utils->serialize_fields_and_values($fields) . " " . ($where ? "WHERE $where" : "");

    return $this->execute($query);
  }
  
  public function delete($table, $where = "")
  {
    $query = "DELETE FROM $table " . ($where ? "WHERE $where" : "");

    return $this->execute($query);
  }

  public function select($fields, $table, $where = "")
  {
    $query = "SELECT " . implode(",", $fields) . " FROM $table " . ($where ? "WHERE $where" : "");

    $results = $this->execute($query);
    $records = [];
    $count = 0;

     while ($fetch = $results->fetch_assoc()) {
      $records[$count] = $fetch;
      $count++;
    }

    return $records;
  }

  public function call_select_procedure($procedure, $params = []) {
    $query = "CALL `$procedure`(" . $this->utils->serialize_values($params) . ")";

    $results = $this->execute($query);
    $records = [];
    $count = 0;

     while ($fetch = $results->fetch_assoc()) {
      $records[$count] = $fetch;
      $count++;
    }

    return $records;
  }
}

?>