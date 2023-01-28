<!doctype html>
<html class="no-js" lang="ru">

<head>
    <meta charset="utf-8">
    <title>КулЗоо</title>
    <meta name="description" content="Путеводитель по Московскому зоопарку">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
</head>

<body>
    <header>
        <div class="header-area">
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
                                        <li><a href="#">Животные</a>
                                            <ul class="submenu">
                                                <li><a href="animals.php">Список</a></li>
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


    <div class="slider_area">
        <div class="single_slider slider_bg_1 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="slider_text">
                            <h3>Мы заботимся <br> <span>о Вашем комфорте</span></h3>
                            <p>Сделайте прогулку по Московскому зоопарку<br> ещё более познавательной и удобной.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dog_thumb d-none d-lg-block">
                <img src="img/pngegg.png" alt="" height="500px">
            </div>
        </div>
    </div>


    <div class="service_area">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-7 col-md-10">
                    <div class="section_title text-center mb-95">
                        <h3>На нашем сайте Вы сможете</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-12">
                <a href="animals.php" style="text-decoration: none;">
                    <div class="single_service">
                         <div class="service_thumb d-flex align-items-center justify-content-center">
                             <div class="service_icon">
                                 <img src="img/service/lamp.png" alt="">
                             </div>
                         </div>
                         <div class="service_content text-center">
                            <h3>Узнать, какие животные представлены в Московском зоопарке</h3>
                        </div>
                    </div></a>
                </div>
                <div class="col-lg-4 col-md-6"><a href="contact.php" style="text-decoration: none;">
                    <div class="single_service active">
                         <div class="service_thumb d-flex align-items-center justify-content-center">
                             <div class="service_icon">
                                 <img src="img/service/lupa.png" alt="">
                             </div>
                         </div>
                         <div class="service_content text-center">
                            <h3>Посмотреть павильоны на карте со списком находящихся там животных</h3>
                        </div>
                    </div></a>
                </div>
                <div class="col-lg-4 col-md-6"><a href="autorization.php" style="text-decoration: none;">
                    <div class="single_service">
                         <div class="service_thumb d-flex align-items-center justify-content-center">
                             <div class="service_icon">
                                 <img src="img/service/map.png" alt="">
                             </div>
                         </div>
                         <div class="service_content text-center">
                            <h3>Добавить животных в избранное и проложить удобный маршрут для их посещения<br>(необходима авторизация)</h3>
                        </div>
                    </div></a>
                </div>
            </div>
        </div>
    </div>


    <div class="adapt_area">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-12">
                    <div class="adapt_help">
                        <div class="section_title text-center">
                            <h3>Московский зоопарк в цифрах</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="adapt_about">
                        <div class="row align-items-center">
                            <div class="col-lg-4 col-md-6"></div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single_adapt text-center">
                                    <img src="img/adapt_icon/Млекопитающие.png" alt="" height="60px">
                                    <div class="adapt_content">
                                        <h3 class="counter">194</h3>
                                        <p>Вида млекопитающих</p>
                                    </div>
                                </div>
                            </div>    
                            <div class="col-lg-4 col-md-6">
                                <div class="single_adapt text-center">
                                    <img src="img/adapt_icon/Птицы.png" alt="" height="60px">
                                    <div class="adapt_content">
                                        <h3 class="counter">330</h3>
                                        <p>Видов птиц</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single_adapt text-center">
                                    <img src="img/adapt_icon/Животные.png" alt="" height="60px">
                                    <div class="adapt_content">
                                        <h3><span class="counter">450</span>+</h3>
                                        <p>Животных</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single_adapt text-center">
                                    <img src="img/adapt_icon/Рептилии.png" alt="" height="60px">
                                    <div class="adapt_content">
                                        <h3 class="counter">246</h3>
                                        <p>Видов рептилий</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single_adapt text-center">
                                    <img src="img/adapt_icon/Амфибии.png" alt="" height="60px">
                                    <div class="adapt_content">
                                        <h3 class="counter">59</h3>
                                        <p>Видов амфибий</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6"></div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single_adapt text-center">
                                    <img src="img/adapt_icon/Рыбы.png" alt="" height="60px">
                                    <div class="adapt_content">
                                        <h3 class="counter">139</h3>
                                        <p>Видов рыб</p>
                                    </div>
                                </div>
                            </div>    
                            <div class="col-lg-4 col-md-6">
                                <div class="single_adapt text-center">
                                    <img src="img/adapt_icon/Беспозвоночные.png" alt="" height="60px">
                                    <div class="adapt_content">
                                        <h3 class="counter">245</h3>
                                        <p>Видов беспозвоночных</p>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



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
    

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>