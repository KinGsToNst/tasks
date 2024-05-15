<?php



for ($i = 0; $i < count($_FILES['image']['name']); $i++) {
   // echo $_FILES['image']['name'][$i];
   // echo $_FILES['image']['tmp_name'][$i];
    upload_file($_FILES['image']['name'][$i],$_FILES['image']['tmp_name'][$i]);
    header('location:task_18.php');
}
function upload_file($filename,$tmp_name){
$result=pathinfo($filename);
$filename=uniqid().".".$result['extension'];
move_uploaded_file($tmp_name,'upload_image/'.$filename);
    $host = 'localhost'; // имя сервера базы данных
    $dbname = 'tasks'; // имя базы данных
    $username = 'root'; // имя пользователя базы данных
    $pass = 'root'; // пароль пользователя базы данных
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $pass);

    $sql="INSERT INTO image_info(image_name) VALUES (:image_name)";

    $statement=$pdo->prepare($sql);
    $statement->execute(['image_name'=>$filename]);

}