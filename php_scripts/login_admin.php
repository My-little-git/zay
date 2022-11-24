<?php

session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/config/connect.php';

$login = $_POST['login'];
$password = $_POST['password'];
$login_errors = [];

$sql = 'select id, password from admins where login = :login';

$data = $db->prepare($sql);
$data->execute(compact('login'));
$admin = $data->fetch(PDO::FETCH_ASSOC);

if ($admin && $admin['password'] === $password){
  $_SESSION['auth'] = true;
  $_SESSION['admin'] = true;
  $_SESSION['admin_id'] = $admin['id'];
  $_SESSION['admin_login'] = $login;
  header('Location: /admin/products.php');
} else {
  $login_errors[] = 'Не удаётся найти вас в системе, проверьте введенные данные';
  header('Location:' . $_SERVER['HTTP_REFERER']);
}