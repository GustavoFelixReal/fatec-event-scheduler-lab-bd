<?php
  require('../db/config.php');
  require('../db/Database.class.php');

  $db = new Database($connection);
  
if ($_POST['create_event']) {
  if ($_POST['event_name'] == '') {
    echo 'Nome do evento é obrigatório!';
    exit;
  } 
  
  if ($_POST['event_date'] == '') {
    echo 'Data do evento é obrigatório!';
    exit;
  }
  
  if ($_POST['event_location'] == '') {
    echo 'Local do evento é obrigatório!';
    exit;
  }
  
  $event = [
    'event_name' => $_POST['event_name'],
    'event_date' => $_POST['event_date'],
    'event_time' => $_POST['event_time'],
    'event_location' => $_POST['event_location'],
  ];

  if ($db->insert($event, 'events')) {
    header('Location: ' . '../pages/events.php?message=success');
    exit;
  }
  
  header('Location: ' . '../pages/create-event.php?message=fail');
  exit;
}

if ($_POST['list_events']) {
  $fields = ['event_id', 'event_name', 'event_date'];

  $events = $db->select($where, 'events', '');

  echo $events;
  exit;
}

?>