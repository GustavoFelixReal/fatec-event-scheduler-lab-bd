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

  public function update($values)
  {

  }

  public function delete($values)
  {

  }

  public function select($values, $table, $where = "")
  {
    $fields = $this->utils->serialize_fields($values);

    $query = "SELECT $fields FROM $table WHERE $where";

    return $this->execute($query);
  }
}

?>