<?php
require_once "./php-connect/connect.php";
session_start();
if (isset($_SESSION['user'])) {
    $current_user = $_SESSION['user'];
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="node_modules/slick-carousel/slick/slick-theme.css">
    <link rel="stylesheet" href="assets/css/povarov.css">
    <link rel="stylesheet" type="text/css" href="assets/css/<?php echo $_SESSION["theme"]; ?>.css" id="theme_link">

    <title>Mptuld</title>
</head>

<body>
    <div class="container">
        <header>
            <!-- Topnav 1-st part -->
            <nav>
                <div class="push-left"> <a href="#" class="logo"><img src="assets/images/logo.svg" alt="Mptuld"></a>
                </div>

                <button onclick="dropDownFunction()" class="catalog_btn dropbtn"><i class="fa-solid fa-bars"></i>
                    Каталог </button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="#">Стандартные запчасти <i class="fa-solid fa-chevron-right"></i> </a>
                    <a href="#">Внешний тюнинг <i class="fa-solid fa-chevron-right"></i> </a>
                    <a href="#">Двигатель <i class="fa-solid fa-chevron-right"></i> </a>
                    <a href="#">Впускная система <i class="fa-solid fa-chevron-right"></i> </a>
                    <a href="#">Выхлопная система <i class="fa-solid fa-chevron-right"></i> </a>
                    <a href="#">Рулеове управление <i class="fa-solid fa-chevron-right"></i> </a>
                    <a href="#">Подвеска <i class="fa-solid fa-chevron-right"></i> </a>
                    <a href="#">Автомобильная оптика <i class="fa-solid fa-chevron-right"></i> </a>
                    <a href="#">Автомобильная электроника <i class="fa-solid fa-chevron-right"></i> </a>
                </div>


                <div>
                    <input type="text" placeholder="Поиск" class="search-bar">
                </div>

                <button class="search_btn"><i class="fa-solid fa-magnifying-glass"></i> Найти</button>

                <div class="push-right">
                    <a href="#"><?php echo $current_user["login"] ?></a>
                </div>
                <div class="v-line">
                    <p style="font-weight:bold;">|</p>
                </div>
                <div>
                    <a href="logout.php?logout=true">Выход</a>
                </div>
            </nav>

            <!-- Topnav 2-nd part -->
            <nav>
                <div class="push-left"> <a href="#"><i class="fa-solid fa-location-dot" style="color:#2A5298;"></i>
                        Регион</a> </div>

                <div>
                    <a href="#">Доставка</a>
                </div>
                <div>
                    <a href="#">Оплата</a>
                </div>
                <div>
                    <a href="#">Гарантии</a>
                </div>
                <div>
                    <a href="#">О компании</a>
                </div>
                <div>
                    <a href="#">Партнерам</a>
                </div>
                <div>
                    <a href="#">Новости</a>
                </div>
                <div>
                    <a href="#">Услуги</a>
                </div>
                <div>
                    <a href="#">Акции</a>
                </div>
                <div>
                    <a href="#">Контакты</a>
                </div>

                <div class="push-right"> <a href="#"><i class="fa-solid fa-basket-shopping" style="color: #2A5298;"></i>
                        Товары в корзине</a> </div>
            </nav>
        </header>

        <div class="following" style="margin: 40px 0 40px 0; text-align:center;">
            <h1>Панель Администратора</h1>
        </div>

        <div class="following">
            <h2>Клиенты</h2> <br>
            <table class="table">
                <tr class="table__row">
                    <th class="table__article">
                        <h2>ID</h2>
                    </th>
                    <th class="table__article">
                        <h2>Телефон</h2>
                    </th>
                    <th class="table__article">
                        <h2>ФИО</h2>
                    </th>
                    <th class="table__article">
                        <h2>ID страны</h2>
                    </th>
                </tr>

                <?php
                if (isset($_GET['idD'])) {
                    $clientD = $_GET['idD'];
                    $qDeleteClient = "DELETE FROM client WHERE id_client='$clientD'";
                    addslashes($qDeleteClient);
                    $resDeleteClient = mysqli_query($connect, $qDeleteClient) or die(mysqli_error($connect));
                }

                $qInfoClients = "SELECT * FROM `client`";
                addslashes($qInfoClients);
                $resInfoClients = mysqli_query($connect, $qInfoClients) or die(mysqli_error($connect));

                while ($InfoClients = mysqli_fetch_object($resInfoClients)) {
                    echo "
                <tr class=\"table__row \">
                <td class=\"table__item \"> 
                <p>$InfoClients->id_client</p> 
                </td>
                <td class=\"table__item \"> 
                        <p>$InfoClients->phone</p>
                    </td>
                    <td class=\"table__item \"> 
                    <p>$InfoClients->fio</p>
                    </td>
                    <td class=\"table__item \"> 
                    <p>$InfoClients->country_id</p>
                    </td>
                    <td class=\"table__item \"> 
                    <a href=\"?idD=$InfoClients->id_client\"><img src=\"assets/images/trash-solid.svg\" width=\"20px\" height=\"20px\"></a>
                    </td>
                </tr>
                    ";
                }
                ?>
            </table>
        </div>

        <div class="following">
            <h2>Активные клиенты</h2> <br>
            <table class="table">
                <tr class="table__row">
                    <th class="table__article">
                        <h2>ID</h2>
                    </th>
                    <th class="table__article">
                        <h2>Телефон</h2>
                    </th>
                    <th class="table__article">
                        <h2>ФИО</h2>
                    </th>
                    <th class="table__article">
                        <h2>ID страны</h2>
                    </th>
                    <th class="table__article">
                        <h2>Количество заказов</h2>
                    </th>
                </tr>

                <?php
                $qInfoClients = "SELECT * FROM `active_clients`";
                addslashes($qInfoClients);
                $resInfoClients = mysqli_query($connect, $qInfoClients) or die(mysqli_error($connect));

                while ($InfoClients = mysqli_fetch_object($resInfoClients)) {
                    echo "
                <tr class=\"table__row \">
                <td class=\"table__item \"> 
                <p>$InfoClients->id_client</p> 
                </td>
                <td class=\"table__item \"> 
                <p>$InfoClients->phone</p>
                    </td>
                    <td class=\"table__item \"> 
                    <p>$InfoClients->fio</p>
                    </td>
                    <td class=\"table__item \"> 
                    <p>$InfoClients->country_id</p>
                    </td>
                    <td class=\"table__item \"> 
                    <p>$InfoClients->count_orders</p>
                    </td>
                    </tr>
                    ";
                }
                ?>
            </table>
        </div>

        <div class="following">
            <h2>Стоимость заказов</h2> <br>
            <table class="table">
                <tr class="table__row">
                    <th class="table__article">
                        <h2>ID</h2>
                    </th>
                    <th class="table__article">
                        <h2>ID клиента</h2>
                    </th>
                    <th class="table__article">
                        <h2>Комментарий к заказу</h2>
                    </th>
                    <th class="table__article">
                        <h2>Дата заказа</h2>
                    </th>
                    <th class="table__article">
                        <h2>ID продавца</h2>
                    </th>
                    <th class="table__article">
                        <h2>Сумма заказа</h2>
                    </th>
                </tr>

                <?php
                $qInfoClients = "SELECT * FROM `stoimost_zakaza`";
                addslashes($qInfoClients);
                $resInfoClients = mysqli_query($connect, $qInfoClients) or die(mysqli_error($connect));

                while ($InfoClients = mysqli_fetch_object($resInfoClients)) {
                    echo "
                <tr class=\"table__row \">
                    <td class=\"table__item \"> 
                        <p>$InfoClients->id</p> 
                    </td>
                    <td class=\"table__item \"> 
                        <p>$InfoClients->client_id</p>
                    </td>
                    <td class=\"table__item \"> 
                        <p>$InfoClients->comment</p>
                    </td>
                    <td class=\"table__item \"> 
                        <p>$InfoClients->date</p>
                    </td>
                    <td class=\"table__item \"> 
                        <p>$InfoClients->seller_id</p>
                    </td>
                    <td class=\"table__item \"> 
                        <p>$InfoClients->sum</p>
                    </td>
                </tr>
                    ";
                }
                ?>
            </table>
        </div>


        <hr>
        <footer>
            <div class="footer_heading">
                <p>Обратный звонок</p>
                <a href="#" class="fb_call">8 800 555 35 35</a>
                <div class="logo_bottom">
                    <a href="#"><img src="assets/images/logo_bottom.svg" alt="Mptuld"></a>
                </div>
            </div>

            <div class="footer_heading">
                <p>Каталог продукции</p>
                <a href="#" class="footer_link">Стандартные запчасти</a>
                <a href="#" class="footer_link">Внешний тюнинг</a>
                <a href="#" class="footer_link">Двигатель</a>
                <a href="#" class="footer_link">Впускная система</a>
                <a href="#" class="footer_link">Выхлопная система</a>
                <a href="#" class="footer_link">Рулевое управление</a>
                <a href="#" class="footer_link">Подвеска</a>
                <a href="#" class="footer_link">Автомобильная оптика</a>
                <a href="#" class="footer_link">Автомобильная электроника</a>
            </div>

            <div class="footer_heading">
                <p>Поиск</p>
                <a href="#" class="footer_link">Поиск по сайту</a>
                <a href="#" class="footer_link">Интерактивная карта</a>
            </div>

            <div class="footer_heading">
                <p>Дополнительно</p>
                <a href="#" class="footer_link">Доставка</a>
                <a href="#" class="footer_link">Гарантии</a>
                <a href="#" class="footer_link">Партнерам</a>
                <a href="#" class="footer_link">Услуги</a>
                <a href="#" class="footer_link">Акции</a>
                <div>
                    <a href="#" class="footer_link">
                        <i class="fa-brands fa-telegram social"></i>
                    </a>
                    <a href="#" class="footer_link">
                        <i class="fa-brands fa-vk social"></i>
                    </a>
                    <a href="#" class="footer_link">
                        <i class="fa-brands fa-youtube social"></i>
                    </a>
                </div>
                <div>
                    <button id="change_theme">Сменить тему</button>
                </div>
            </div>
        </footer>
    </div>

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/slick-carousel/slick/slick.min.js"></script>
    <script src="/assets/js/script.js"></script>

</body>

</html>