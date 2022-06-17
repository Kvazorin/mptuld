<?php 
require "db.php";
session_start();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="node_modules/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="node_modules/slick-carousel/slick/slick-theme.css">
    <link rel="stylesheet" href="assets/css/povarov.css">
    <link rel="stylesheet" href="assets/css/styles(light).css" id="theme_link">

    <title>Mptuld</title>
</head>

<body>
    <div class="container">
        <header>
            <!-- Topnav 1-st part -->
            <nav>
                <div class="push-left"> <a href="#" class="logo"><img src="assets/images/logo.svg" alt="Mptuld"></a>
                </div>

                <button class="catalog_btn"><i class="fa-solid fa-bars"></i> Каталог</button>

                <div>
                    <input type="text" placeholder="Поиск" class="search-bar">
                </div>

                <button class="search_btn"><i class="fa-solid fa-magnifying-glass"></i> Найти</button>

                <div class="push-right">
                    <a href="#">Вход</a>
                </div>
                <div>
                    <p style="font-weight:bold;">|</p>
                </div>
                <div>
                    <a href="#">Регистрация</a>
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

        <!-- Main slider -->
        <div class="slider">
            <div class="slider-item">
                <img src="assets/images/slider-item(1).jpg" alt="">
            </div>
            <div class="slider-item">
                <img src="assets/images/slider-item(2).jpg" alt="">
            </div>
            <div class="slider-item">
                <img src="assets/images/slider-item(3).jpg" alt="">
            </div>
        </div>

        <div class="following">
            <p>Хиты продаж</p>
        </div>

        <!-- Prodcts slider -->
        <div class="slider-small">
            <div class="slider-item">
                <div class="product-item">
                    <img src="assets/images/product(1).png" alt="product(1)">
                    <a href="#">Рычаг КПП "Drift" удлиненный</a>
                    <div class="rating">
                        <a href="#">
                            <img src="assets/images/stars.svg" alt="rating">
                        </a>
                    </div>
                    <div class="pricetag">
                        <a href="#">1300 руб.</a>
                    </div>
                </div>
            </div>
            <div class="slider-item">
                <div class="product-item">
                    <img src="assets/images/product(2).png" alt="product(2)">
                    <a href="#">Фильтр нулевого сопротивления</a>
                    <div class="rating">
                        <a href="#">
                            <img src="assets/images/stars.svg" alt="rating">
                        </a>
                    </div>
                    <div class="pricetag">
                        <a href="#">1490 руб.</a>
                    </div>
                </div>
            </div>
            <div class="slider-item">
                <div class="product-item">
                    <img src="assets/images/product(3).png" alt="product(3)">
                    <a href="#">Комплект реактивных штанг "Ситек"</a>
                    <div class="rating">
                        <a href="#">
                            <img src="assets/images/stars.svg" alt="rating">
                        </a>
                    </div>
                    <div class="pricetag">
                        <a href="#">2590 руб.</a>
                    </div>
                </div>
            </div>
            <div class="slider-item">
                <div class="product-item">
                    <img src="assets/images/product(4).png" alt="product(4)">
                    <a href="#">Задние фонари "Орлиный глаз"</a>
                    <div class="rating">
                        <a href="#">
                            <img src="assets/images/stars.svg" alt="rating">
                        </a>
                    </div>
                    <div class="pricetag">
                        <a href="#">4690 руб.</a>
                    </div>
                </div>
            </div>
            <div class="slider-item">
                <div class="product-item">
                    <img src="assets/images/product(5).png" alt="product(5)">
                    <a href="#">Воздушный фильтр</a>
                    <div class="rating">
                        <a href="#">
                            <img src="assets/images/stars.svg" alt="rating">
                        </a>
                    </div>
                    <div class="pricetag">
                        <a href="#">649 руб.</a>
                    </div>
                </div>
            </div>
            <div class="slider-item">
                <div class="product-item">
                    <img src="assets/images/product(6).png" alt="product(6)">
                    <a href="#">Реактивные тяги "Ситек" Спринт-Р, регулируемые</a>
                    <div class="rating">
                        <a href="#">
                            <img src="assets/images/stars.svg" alt="rating">
                        </a>
                    </div>
                    <div class="pricetag">
                        <a href="#">4690 руб.</a>
                    </div>
                </div>
            </div>
            <div class="slider-item">
                <div class="product-item">
                    <img src="assets/images/product(7).png" alt="product(7)">
                    <a href="#">USB зарядное устройство на 2 слота</a>
                    <div class="rating">
                        <a href="#">
                            <img src="assets/images/stars.svg" alt="rating">
                        </a>
                    </div>
                    <div class="pricetag">
                        <a href="#">649 руб.</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="following">
            <p>Акции</p>
        </div>

        <!-- Prodcts slider -->
        <div class="slider-small">
            <div class="slider-item">
                <div class="product-item">
                    <img src="assets/images/product(1).png" alt="product(1)">
                    <a href="#">Рычаг КПП "Drift" удлиненный</a>
                    <div class="rating">
                        <a href="#">
                            <img src="assets/images/stars.svg" alt="rating">
                        </a>
                    </div>
                    <div class="pricetag">
                        <a href="#">1300 руб.</a>
                    </div>
                </div>
            </div>
            <div class="slider-item">
                <div class="product-item">
                    <img src="assets/images/product(2).png" alt="product(2)">
                    <a href="#">Фильтр нулевого сопротивления</a>
                    <div class="rating">
                        <a href="#">
                            <img src="assets/images/stars.svg" alt="rating">
                        </a>
                    </div>
                    <div class="pricetag">
                        <a href="#">1490 руб.</a>
                    </div>
                </div>
            </div>
            <div class="slider-item">
                <div class="product-item">
                    <img src="assets/images/product(3).png" alt="product(3)">
                    <a href="#">Комплект реактивных штанг "Ситек"</a>
                    <div class="rating">
                        <a href="#">
                            <img src="assets/images/stars.svg" alt="rating">
                        </a>
                    </div>
                    <div class="pricetag">
                        <a href="#">2590 руб.</a>
                    </div>
                </div>
            </div>
            <div class="slider-item">
                <div class="product-item">
                    <img src="assets/images/product(4).png" alt="product(4)">
                    <a href="#">Задние фонари "Орлиный глаз"</a>
                    <div class="rating">
                        <a href="#">
                            <img src="assets/images/stars.svg" alt="rating">
                        </a>
                    </div>
                    <div class="pricetag">
                        <a href="#">4690 руб.</a>
                    </div>
                </div>
            </div>
            <div class="slider-item">
                <div class="product-item">
                    <img src="assets/images/product(5).png" alt="product(5)">
                    <a href="#">Воздушный фильтр</a>
                    <div class="rating">
                        <a href="#">
                            <img src="assets/images/stars.svg" alt="rating">
                        </a>
                    </div>
                    <div class="pricetag">
                        <a href="#">649 руб.</a>
                    </div>
                </div>
            </div>
            <div class="slider-item">
                <div class="product-item">
                    <img src="assets/images/product(6).png" alt="product(6)">
                    <a href="#">Реактивные тяги "Ситек" Спринт-Р, регулируемые</a>
                    <div class="rating">
                        <a href="#">
                            <img src="assets/images/stars.svg" alt="rating">
                        </a>
                    </div>
                    <div class="pricetag">
                        <a href="#">4690 руб.</a>
                    </div>
                </div>
            </div>
            <div class="slider-item">
                <div class="product-item">
                    <img src="assets/images/product(7).png" alt="product(7)">
                    <a href="#">USB зарядное устройство на 2 слота</a>
                    <div class="rating">
                        <a href="#">
                            <img src="assets/images/stars.svg" alt="rating">
                        </a>
                    </div>
                    <div class="pricetag">
                        <a href="#">649 руб.</a>
                    </div>
                </div>
            </div>
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
