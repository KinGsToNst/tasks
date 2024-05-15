<?php
var_dump($_FILES);
exit;
$host = 'localhost'; // имя сервера базы данных
$dbname = 'tasks'; // имя базы данных
$username = 'root'; // имя пользователя базы данных
$pass = ''; // пароль пользователя базы данных
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $pass);


if($_POST['submit']){


$upload_dir='upload_image/';

$file_name=$_FILES['image']['name'];
$file_tmp=$_FILES['image']['tmp_name'];

//генерируем уникальное имя
$unique_name=uniqid();
//получаем тип файла
$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

// и записываем путь уникальное имя и тип файла
 $new_file_name=$unique_name.'.'.$file_ext;
move_uploaded_file($file_tmp,$upload_dir.$new_file_name);

    $sql="INSERT INTO image_info(image_name) VALUES (:image_name)";

    $statement=$pdo->prepare($sql);
    $statement->execute(['image_name'=>$new_file_name]);

    echo 'картинка добавлена';
    header('location:task_18.php');
}