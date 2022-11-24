<?php

session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/config/connect.php';

$name = trim($_POST['name']);
$surname = trim($_POST['surname']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$rep_password = trim($_POST['rep_password']);

$errors_register = [];

$sql_select = 'select id from users where email = :email';
$sql_insert = 'insert into users(name, surname, email, password) values (:name, :surname, :email, :password)';

$data = $db->prepare($sql_select);
$data->execute(compact('email'));
$user_check_email = $data->fetch(PDO::FETCH_ASSOC);

if ($user_check_email){
  $errors_register[] = 'Пользователь с такой почтой уже существует!';
  header('Location:' . $_SERVER['HTTP_REFERER']);
}
if ($password !== $rep_password){
  $errors_register[] = 'Пароли не совпадают!';
}
if (strlen($password) < 6){
  $errors_register[] = 'Длина пароля должна быть больше 5 символов';
}
if (strlen($name) < 2){
  $errors_register[] = 'Длина имени должна быть больше 1 символа';
}
if (strlen($name) > 60){
  $errors_register[] = 'Длина имени должна быть меньше 60 символов';
}
if (strlen($surname) < 4){
  $errors_register[] = 'Длина фамилии должна быть больше 3 символов';
}
if (strlen($surname) > 60){
  $errors_register[] = 'Длина фамилии должна быть меньше 60 символов';
}

if (empty($errors_register)){
  $data = $db->prepare($sql_insert);
  $data->execute(compact('name', 'surname', 'email', 'password'));
  $_SESSION['auth'] = true;
  $_SESSION['user_id'] = $db->lastInsertId();
  $_SESSION['user_name'] = $name;
  header('Location: /index.php');
} else {
  header('Location:' . $_SESSION['HTTP_REFEBER']);
}