<?php
class DBUtils
{
  public function serialize_fields($fields)
  {
    $serialized = "";

    foreach ($fields as $key => $value) {
      $serialized .= "$key" . (count($fields) - 1 == array_search($key, array_keys($fields)) ? '' : ',');
    }

    return $serialized;
  }

  public function serialize_values($fields)
  {
    $serialized = "";

    foreach ($fields as $key => $value) {
      $serialized .= "'$value'" . (count($fields) - 1 == array_search($key, array_keys($fields)) ? '' : ',');
    }

    return $serialized;
  }
}
?>