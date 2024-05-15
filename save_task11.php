<?php
session_start();
$text=$_POST['text'];
$host = 'localhost'; // имя сервера базы данных
$dbname = 'tasks'; // имя базы данных
$username = 'root'; // имя пользователя базы данных
$password = ''; // пароль пользователя базы данных
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);


$sql="SELECT * FROM  test_table WHERE text=:text";

$statement=$pdo->prepare($sql);
$statement->execute(['text'=>$text]);
$task=$statement->fetch(PDO::FETCH_ASSOC);
if(!empty($task)){
    $danger='Введенная запись уже существует1';
    $_SESSION['danger']=$danger;
    header("Location:/task_11.php");
    exit;
}else{
    $sql="INSERT INTO test_table(text) VALUES (:text)";

    $statement=$pdo->prepare($sql);
    $statement->execute(['text'=>$text]);
    $success='Данные успешно добавлены';
    $_SESSION['success']=$success;
    echo "Данные успешно добавлены";
    header("Location:/task_11.php");
}







