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
    'event_created_at' => Date('Y-m-y H:i:s')
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

  $events = $db->select($fields, 'events', '');

  echo json_encode($events);
  exit;
}

if ($_POST['get_event']) {
  $fields = ['event_id', 'event_name', 'event_date', 'event_time', 'event_location'];

  $where = "event_id = " . $_POST['get_event'];

  $event = $db->select($fields, 'events', $where);

  echo json_encode($event[0]);
  exit;
}

if ($_POST['edit_event']) {
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

  $where = "event_id = " . $_POST['event_id'];

  if ($db->update($event, 'events', $where)) {
    header('Location: ' . '../pages/events.php?message=edit-success');
    exit;
  }
  
  header('Location: ' . '../pages/edit-event.php?message=edit-fail');
  exit;
}

if ($_POST['delete_event']) {
  $where = "event_id = " . $_POST['delete_event'];

  if ($db->delete('events', $where)) {
    header('Location: ' . '../pages/events.php?message=delete-success');
    exit;
  }

  header('Location: ' . '../pages/events.php?message=delete-fail');
  exit;
}

if ($_POST['report_event']) {
  $params = [
    'event_start_date' => $_POST['event_start_date'], 
    'event_end_date' => $_POST['event_end_date']
  ];

  $events = $db->call_select_procedure('get_events_on_period', $params);

  echo json_encode($events);
}

?>