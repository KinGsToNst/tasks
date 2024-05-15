<?php
session_start();
$host = 'localhost'; // имя сервера базы данных
$dbname = 'tasks'; // имя базы данных
$username = 'root'; // имя пользователя базы данных
$pass = 'root'; // пароль пользователя базы данных
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $pass);

if(!empty($_GET["id"]) && is_numeric($_GET["id"])){
    $image_id=$_GET["id"];
    $stmt = $pdo->prepare("SELECT image_name FROM image_info WHERE id = :id");
    $stmt->bindParam(':id', $image_id, PDO::PARAM_INT);
    $stmt->execute();
    $image_name=$stmt->fetchColumn();
    $upload_path = 'upload_image/';
    $full_image_path=$upload_path.$image_name;
    var_dump(file_exists($full_image_path));
    if(file_exists($full_image_path)){
        unlink($full_image_path);
        $message='ваш Файл удален';
        $_SESSION['success']=$message;


        header('location:/task_18.php');
    }else{
        $message="такого файла нет";
        $_SESSION['danger']=$message;
        header('location:/task_18.php');
    }
   // $image_name = $stmt->fetchColumn();
    $query = "DELETE FROM image_info WHERE id = :id";
// Подготовка запроса
    $statement = $pdo->prepare($query);
// Привязка значения параметра
    $statement->bindParam(':id', $image_id);
// Установка значения параметра
// Выполнение запроса
    $statement->execute();


}