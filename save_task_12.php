<?php
session_start();
//var_dump($_POST);die();
$email=$_POST['email'];
$password=$_POST['password'];
$host = 'localhost'; // имя сервера базы данных
$dbname = 'tasks'; // имя базы данных
$username = 'root'; // имя пользователя базы данных
$password = 'root'; // пароль пользователя базы данных
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);


$sql="SELECT * FROM  test_task_12 WHERE email=:email";

$statement=$pdo->prepare($sql);
$statement->execute(['email'=>$email]);
$user=$statement->fetch(PDO::FETCH_ASSOC);

if(!empty($user)){
    $danger='Введенная запись уже существует 1';
    $_SESSION['danger']=$danger;
    header("Location:/task_12.php");
    exit;
}else{
    $hashed_password=password_hash($password,PASSWORD_DEFAULT);
    $sql="INSERT INTO test_task_12(email,password) VALUES (:email,:password)";

    $statement=$pdo->prepare($sql);
    $statement->execute(['email'=>$email,'password'=>$hashed_password]);
    $success='Данные успешно добавлены 1';
    $_SESSION['success']=$success;
    echo "Данные успешно добавлены";
    header("Location:/task_12.php");
}