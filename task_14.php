<?php
session_start(); // начинаем сессию

// Проверяем, была ли установлена переменная 'counter' в сессии, если нет, устанавливаем ее в 0
if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
}

// Если нажата кнопка увеличения счетчика, то увеличиваем счетчик на 1
if (isset($_POST['increment'])) {
    $_SESSION['counter']++;
}
if (isset($_POST['del_session'])) {
   unset($_SESSION['counter']);
    $_SESSION['counter'] = 0;
}

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
    </head>
    <body class="mod-bg-1 mod-nav-link ">
        <main id="js-page-content" role="main" class="page-content">
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
                                    <?php if(!empty($_SESSION['counter'])): ?>
                                        <div class="alert alert-info fade show" role="alert">
                                            Кнопка была нажата: <b><?php echo $_SESSION['counter']; ?></b> раз
                                        </div>
                                    <?php endif;?>
                                    <?php if(empty($_SESSION['counter'])): ?>
                                        <div class="alert alert-info fade show" role="alert">
                                            Кнопка была нажата: <b><?php echo $_SESSION['counter']; ?></b> раз
                                        </div>
                                    <?php endif;?>

                                    <form action="" method="post">
                                        <button type="submit" name="increment" class="btn btn-success mt-3 ">Submit</button>
                                        <button type="submit" name="del_session" class="btn btn-danger mt-3 ">Удаление сессии</button>
                                    </form>
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
