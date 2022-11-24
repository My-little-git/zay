<?php

session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/config/connect.php';

$email = $_POST['email'];
$password = $_POST['password'];
$login_errors = [];

$sql = 'select id, name, password from users where email = :email';

$data = $db->prepare($sql);
$data->execute(compact('email'));
$user = $data->fetch(PDO::FETCH_ASSOC);

if ($user && $user['password'] === $password){
  $_SESSION['auth'] = true;
  $_SESSION['user_id'] = $user['id'];
  $_SESSION['user_name'] = $user['name'];
  header('Location: /register.php');
} else {
  $login_errors[] = 'Не удаётся найти вас в системе, проверьте введенные данные';
  header('Location:' . $_SERVER['HTTP_REFERER']);
}