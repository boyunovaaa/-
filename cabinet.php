<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>КулЗоо</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</head>

<body>
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo">
                                <a href="index.php">
                                    <img src="img/logo.png" alt="" height="50px">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a  href="index.php">Главная</a></li>
                                        <li><a href="about.php">О зоопарке</a></li>
                                        <li><a href="#">Животные <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="blog.php">Список</a></li>
                                                <li><a href="contact.php">Карта</a></li>
                                            </ul>
                                        </li>
                                        <?php
                                            session_start();
                                            if (empty($_SESSION['auth'])) { ?>
                                                <li><a href="autorization.php">Войти</a></li>
                                            <?php }
                                            if (!empty($_SESSION['auth'])){ ?>
                                                <li><a href="cabinet.php">Личный кабинет</a></li>
                                            <?php }
                                        ?>
                                        <!-- li><a href="autorization.php">Авторизация</a></li -->
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="bradcam_area breadcam_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcam_text text-center">
                        <h3>Личный кабинет</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>                                            

    <?php 
    include "dbconnect.php";
    $sql=mysqli_query($conn, 'SELECT rights FROM user WHERE id="'.$_SESSION['auth'].'" AND rights=1');
    $res = mysqli_fetch_array($sql);
    //console.log($res);
    if (isset($res)){
        echo '<form method="POST" action="" style="text-align: center; height: 100px;">
        <button class="button" name="sub">Выход</button><br>
        </form>';

        if(isset($_POST['sub'])) {
            session_destroy();
            $_SESSION['auth'] = null;
            #redirect
            header('Location: autorization.php');
            exit;
        } 

        echo '<div class="row justify-content-center"><div class="col-lg-10"><table border="3px" bordercolor = "black" bgcolor = "white" width = "500" align="center" class="table" id = "achieve">';
        $sql = mysqli_query($conn, 'SELECT * FROM messages');
        while ($result = mysqli_fetch_array($sql)) {
        echo '<tr>'.'<td>'. $result['fio'].'</td>'.'<td>'. $result['email'].'</td>'.'<td>'. $result['subject'].'</td>'.'<td>'. $result['message'].'</td>'.'</tr>';
        }
        echo '</table></div></div>';
    }
    else{
        echo '<form method="POST" action="" style="text-align: center; height: 500px;">
        <button class="button" name="fav" style="margin-top: 80px;">Избранные животные</button><br>
        <button class="button" name="sub">Выход</button><br>
        </form>';

        if(isset($_POST['sub'])) {
            session_destroy();
            $_SESSION['auth'] = null;
            #redirect
            header('Location: autorization.php');
            exit;
        } 
    
        if(isset($_POST['fav'])) {
            header('Location: favorite.php');
            exit;
        } 
    }
    
    ?>
    <!-- form method="POST" action="" style="text-align: center; height: 500px;">
        <button class="button" name="fav" style="margin-top: 80px;">Избранные животные</button><br>
        <button class="button" name="sub">Выход</button><br>
    </form -->
    

    <!-- ?php 
        if(isset($_POST['sub'])) {
        session_destroy();
        $_SESSION['auth'] = null;
        #redirect
        header('Location: autorization.php');
        exit;
        } 

        if(isset($_POST['fav'])) {
            header('Location: favorite.php');
            exit;
        } 
    ? -->


<footer class="footer" id="contacts">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="footer_title">Обратная связь</h3>
                        <form class="form-contact contact_form" action="" method="post" id="contactForm" novalidate="novalidate">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Введите ФИО'" placeholder="ФИО">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Введите email'" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Введите тему'" placeholder="Тема">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Напишите сообщение'" placeholder="Сообщение"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button">Отправить</button>
                            </div>
                        </form>
                        <?php
                        
                        include "dbconnect.php";
                        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])){
                            $query = "INSERT INTO `messages` (`fio`, `email`, `subject`, `message`) VALUES ('{$_POST['name']}', '{$_POST['email']}', '{$_POST['subject']}', '{$_POST['message']}')"; 
                    
                            $result = mysqli_query($conn, $query);
                        }
                        ?>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Контакты
                            </h3>
                            <ul class="address_line">
                                <li>8 (977) 801-01-43</li>
                                <li><a href="#">olga.boyunova@gmail.com</a></li>
                                <li>Россия, Москва</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3 ">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="img/logo.png" alt="" height="50px">
                                </a>
                            </div>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <img src="img/telegram.png" alt="" height="20px">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="img/вк.png" alt="" height="20px">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="img/youtube.png" alt="" height="20px">
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="bordered_1px"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <p>
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                            </p>
                            <p>
                                Для создания приложения были использованы открытые данные с сайта https://data.mos.ru/ <br>

                                Источник: https://data.mos.ru/opendata/3286
                            </p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>