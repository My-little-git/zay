<?php

require $_SERVER['DOCUMENT_ROOT'] . '/config/connect.php';

$contact_errors = [];

$sql = 'insert into contacts(name, email, subject, message) values (:name, :email, :subject, :message)';
$request = $db->prepare($sql);

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$subject = trim($_POST['subject']) !== '' ? trim($_POST['subject']) : NULL;
$message = trim($_POST['message']);

if (strlen($name) < 2){
  $contact_errors[] = 'Длина имени должна быть больше 1 символа';
}
if (strlen($name) > 60){
  $contact_errors[] = 'Длина имени должна быть меньше 60 симолов';
}
if (strlen($message) < 6){
  $contact_errors[] = 'Длина текста должна быть больше 5 символов';
}
if (strlen($message) > 1000){
  $contact_errors[] = 'Длина текста не должна превышать 1000 символов';
}

if (empty($contact_errors)){
  $request->execute(compact('name', 'email', 'subject', 'message'));
  header('Location: /index.php');
} else {
  $_SESSION['contact_errors'] = $contact_errors;
  header('Location:' . $_SERVER['HTTP_REFERER']);
}