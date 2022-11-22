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

  public function fetch($query)
  {
    
  }

  public function insert($values, $table)
  {
    $query = "INSERT INTO $table (" . $this->utils->serialize_fields($values) . ") VALUES (" . $this->utils->serialize_values($values) . ");";

    return $this->execute($query);
  }

  public function update($values)
  {

  }

  public function delete($values)
  {

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
}

?>