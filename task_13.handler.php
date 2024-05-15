<?php
session_start();
$text=$_POST['text'];
if(!empty($text)){
    $message='Ваше сообщение выводится тут';
    $_SESSION['text']=$message;
   header('location:/task_13.php');
}