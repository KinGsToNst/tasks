<?php
$host = 'localhost'; // имя сервера базы данных
$dbname = 'tasks'; // имя базы данных
$username = 'root'; // имя пользователя базы данных
$pass = ''; // пароль пользователя базы данных
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $pass);


$query = "SELECT * FROM image_info ";
$stmt = $pdo->query($query);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);



// Выводим список картинок

foreach ($results as $image){
   var_dump($image["image_name"]);
    echo '<img src="'.'upload_image/'.$image["image_name"]. '" alt="">';
}

