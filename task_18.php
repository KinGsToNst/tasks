<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>
            Подготовительные задания к курсу
        </title>
        <meta name="description" content="Chartist.html">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
        <link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
        <link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
        <link rel="stylesheet" media="screen, print" href="css/statistics/chartist/chartist.css">
        <link rel="stylesheet" media="screen, print" href="css/miscellaneous/lightgallery/lightgallery.bundle.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-regular.css">
        <link rel="stylesheet" href="css/style.css">

    </head>
    <body class="mod-bg-1 mod-nav-link ">
        <main id="js-page-content" role="main" class="page-content">
            <div class="row">
                <div class="col-md-6">
                    <div id="panel-1" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Задание
                            </h2>
                            <div class="panel-toolbar">
                                <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                            </div>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div class="panel-content">
                                    <div class="form-group">
                                        <form action="upload_handler_multi.php" method="post" enctype="multipart/form-data" >
                                            <?php if(!empty($_SESSION['danger'])): ?>
                                                <div class="alert alert-danger fade show" role="alert">
                                                    <?php  echo $_SESSION['danger']; unset($_SESSION['danger']);?>
                                                </div>
                                            <?php endif;?>
                                            <?php if(!empty($_SESSION['success'])): ?>
                                                <div class="alert alert-success fade show" role="alert">
                                                    <?php  echo $_SESSION['success']; unset($_SESSION['success']);?>
                                                </div>
                                            <?php endif;?>
                                            <div class="form-group">
                                                <label class="form-label" for="simpleinput">Image</label>
                                            <input type="file" name="image[]" id="simpleinput" class="form-control" multiple>
                                            </div>
                                            <button type="submit" value="Загрузить файл" name="submit" class="btn btn-success mt-3">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div id="panel-1" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Загруженные картинки
                            </h2>
                            <div class="panel-toolbar">
                                <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                            </div>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div class="panel-content image-gallery">

                                    <div class="row">
                                        <?php
                                        $host = 'localhost'; // имя сервера базы данных
                                        $dbname = 'tasks'; // имя базы данных
                                        $username = 'root'; // имя пользователя базы данных
                                        $pass = 'root'; // пароль пользователя базы данных
                                        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $pass);


                                        $query = "SELECT * FROM image_info ";
                                        $stmt = $pdo->query($query);
                                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);



                                        // Выводим список картинок

                                        foreach ($results as $image):


                                        ?>
                                        <div class="col-md-3 image">
                                            <img src="upload_image/<?=$image["image_name"]?>">
                                            <a class="btn btn-danger" href="delete_image_18.php?id=<?=$image["id"]?>" onclick="return confirm('Вы уверены?');">Удалить</a></div>

                                        <?php endforeach;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </main>
        

        <script src="js/vendors.bundle.js"></script>
        <script src="js/app.bundle.js"></script>
        <script>
            // default list filter
            initApp.listFilter($('#js_default_list'), $('#js_default_list_filter'));
            // custom response message
            initApp.listFilter($('#js-list-msg'), $('#js-list-msg-filter'));
        </script>
    </body>
</html>
