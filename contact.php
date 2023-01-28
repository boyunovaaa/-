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
    
    <script src="https://api-maps.yandex.ru/2.1/?apikey=949c419f-7cb8-41ba-9e1b-e7c3f69e0086&lang=ru_RU" type="text/javascript"></script>
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
                        <h3>Карта Московского зоопарка</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <div class="col-lg-12">
    <!-- ?php
    include "dbconnect.php";
    $sql = mysqli_query($conn, 'SELECT DISTINCT Coo FROM `zoo`');

    while ($result = mysqli_fetch_array($sql)){
        $arr[] = $result["Coo"];

    }

    print_r($arr);
    ? -->
        <div id="map" class="map" style="height: 800px">
            <script type="text/javascript">
                // Функция ymaps.ready() будет вызвана, когда
                // загрузятся все компоненты API, а также когда будет готово DOM-дерево.
            
                <?php
                    $arr1 = [];
                    $arr2 = [];
                    include "dbconnect.php";
                    $sql1 = mysqli_query($conn, 'SELECT DISTINCT Coo1, Coo2, CageLocation FROM `zoo3`;');
                    while ($result1 = mysqli_fetch_array($sql1)){
                        $arr1[] = (float)$result1["Coo1"];
                        $arr2[] = (float)$result1["Coo2"];
                        $cagelocation[] = $result1["CageLocation"];
                    }
                ?>

                var coo1 =JSON.parse('<?=json_encode($arr1)?>');

                var coo2 =JSON.parse('<?=json_encode($arr2)?>');

                var cagelocation =JSON.parse('<?=json_encode($cagelocation)?>');

                var coords=[], i, j;
                for (i=0; i<42; i++){
                    coords.push(i);
                    coords[i] = [];
                for (j=0; j<1; j++){
                    coords[i].push(coo1[i], coo2[i]);
                }
                }

                <?php
                if (isset($_GET['coo1']) && isset($_GET['coo2'])){ 
                    include 'dbconnect.php';
                    $sql = mysqli_query($conn, 'SELECT CageLocation FROM `zoo3` WHERE Coo1='.$_GET['coo1'].' AND Coo2='.$_GET['coo2'].'');
                    while ($result = mysqli_fetch_array($sql)){
                        $CageLocation = $result["CageLocation"];
                    }?>
                    var cagelocation =<?php echo $cagelocation; ?>;
                    console.log(cagelocation);
                    ymaps.ready(init);
                    function init(){
                        var pointA = [55.761173, 37.578433],
                        pointB = [<?php echo $_GET['coo1'] ?>, <?php echo $_GET['coo2'] ?>],
                        /**
                         * Создаем мультимаршрут.
                         * @see https://api.yandex.ru/maps/doc/jsapi/2.1/ref/reference/multiRouter.MultiRoute.xml
                         */
                        multiRoute = new ymaps.multiRouter.MultiRoute({
                            referencePoints: [
                                pointA,
                                pointB
                            ],
                            params: {
                                //Тип маршрутизации - пешеходная маршрутизация.
                                routingMode: 'pedestrian'
                            }
                        }, {
                            // Автоматически устанавливать границы карты так, чтобы маршрут был виден целиком.
                            boundsAutoApply: true
                        });

                        // Создаем кнопку.
                        var changePointsButton = new ymaps.control.Button({
                            data: {content: "Поменять местами точки А и В"},
                            options: {selectOnClick: true}
                        });

                        // Объявляем обработчики для кнопки.
                        changePointsButton.events.add('select', function () {
                            multiRoute.model.setReferencePoints([pointB, pointA]);
                        });

                        changePointsButton.events.add('deselect', function () {
                            multiRoute.model.setReferencePoints([pointA, pointB]);
                        });

                        // Создаем карту с добавленной на нее кнопкой.
                        var myMap = new ymaps.Map('map', {
                            center: [55.76323808, 37.58051340],
                            zoom: 16,
                            controls: [changePointsButton, 'fullscreenControl']
                        }, {
                            buttonMaxWidth: 300
                        });

                        // Добавляем мультимаршрут на карту.
                        myMap.geoObjects.add(multiRoute);

                        /*var myMap = new ymaps.Map("map", {
                            center: [55.76323808, 37.58051340],
                            zoom: 16
                        });
                        var myClusterer = new ymaps.Clusterer();
                        myPlacemark = new ymaps.Placemark([<!-- ?php echo $_GET['coo1'] ?>, <!-- ?php echo $_GET['coo2'] ?>], {
                                //balloonContentHeader: $cagelocation[0],
                                //balloonContentFooter: '<a href="blog.php">Посмотреть животных</a>',
                                //hintContent: cagelocation[i]
                        });
                        myMap.geoObjects.add(myPlacemark);*/
                    } 
                <?php } 
                if (!isset($_GET['coo1']) && !isset($_GET['coo2']) && !isset($_GET['fav'])){ ?>
                    ymaps.ready(init);
                    function init(){
                    var myMap = new ymaps.Map("map", {
                        center: [55.76323808, 37.58051340],
                        zoom: 16
                    });
                    var myClusterer = new ymaps.Clusterer();
                    for (var i = 0; i<coords.length; i++) {

                        myPlacemark = new ymaps.Placemark([coords[i][0], coords[i][1]], {
                            balloonContentHeader: cagelocation[i],
                            balloonContentFooter: '<a href="animals.php?loc=' + cagelocation[i] + '">Посмотреть животных</a>',
                            hintContent: cagelocation[i]
                        });
                        myMap.geoObjects.add(myPlacemark);
                        myClusterer.add(myPlacemark);
                    };
                    myMap.geoObjects.add(myClusterer);
                    }
                <?php }
                ?>
                <?php
                if (isset($_GET['fav'])){ 
                    $coo1 = [];
                    $coo2 = [];
                    include "dbconnect.php";
                    $fav = mysqli_query($conn, 'SELECT DISTINCT zoo3.Coo1, zoo3.Coo2 FROM ((favorites JOIN zoo2 ON favorites.id_animal=zoo2.id) JOIN zoo3 ON zoo2.NoCageLocation=zoo3.id) WHERE favorites.id_user="'.$_SESSION['auth'].'"');
                    while ($favres = mysqli_fetch_array($fav)){
                        $coo1[] = (string)$favres["Coo1"];
                        $coo2[] = (string)$favres["Coo2"];
                    }
                    ?>

                    var fav1 =JSON.parse('<?=json_encode($coo1)?>');

                    var fav2 =JSON.parse('<?=json_encode($coo2)?>');


                    var favs=[];
                    favs[0]="55.761173, 37.578433";
                    for (i=1; i<fav1.length+1; i++){
                        favs[i]=fav1[i-1] + ', ' + fav2[i-1];
                    }
                    console.log(favs);

                    function init () {
                        // Создаем мультимаршрут.
                        var multiRoute = new ymaps.multiRouter.MultiRoute({
                            referencePoints: favs,
                            params: {
                                routingMode: 'pedestrian'
                            }
                        });
                        
                        ymaps.modules.require([
                            'MultiRouteColorizer'
                        ], function (MultiRouteColorizer) {
                            // Создаем объект, раскрашивающий линии сегментов маршрута.
                            new MultiRouteColorizer(multiRoute);
                        });
                    
                        // Создаем карту.
                        var myMap = new ymaps.Map('map', {
                            center: [55.76323808, 37.58051340],
                            zoom: 16,
                            controls: ['fullscreenControl']
                        }, {
                            buttonMaxWidth: 300
                        });
                    
                        // Добавляем мультимаршрут на карту.
                        myMap.geoObjects.add(multiRoute);
                    }
                    
                    ymaps.ready(init);
                    
                <?php
                }
                ?>

                
                
            </script>
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