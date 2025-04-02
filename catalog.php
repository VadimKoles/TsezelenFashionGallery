<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="swiper-bundle.css">
    <link rel="icon" href="images/logo_tsezelen_main2.png">
    <title>Tsezelen</title>
</head>
<body>
    
    <div class="loading" id="<?php if (!isset($_GET["id"])) {echo 't';} else {echo 'f';} ?>" style="<?php if (!isset($_GET["id"])) {echo '';} else {echo 'display: none;';} ?>">
        <div class="circle" id="point1"></div>
        <div class="circle" id="point2"></div>
        <div class="circle" id="point3"></div>
    </div>

    <?php
        $mysql = new mysqli("MySQL-8.0", "root", "", "Tsezelen"); //подключение к бд
        $mysql->query("SET NAMES 'utf8'");
        if($mysql->connect_error){
            echo 'Error Number: '.$mysql->connect_errno.'<br>';
            echo 'Error: '.$mysql->connect_error;
        } else {
            $res = $mysql->query("SELECT * FROM `goods`") or die();
            $shirts = [];
            $tShirts = [];
            $skirts = [];
            $trousers = [];
            $blazers = [];
            $accessories = [];
            while($row = $res->fetch_assoc()) {
                $goods[] = $row;
                if ($row['type'] == "shirt") {
                    $shirts[] = $row;
                } elseif ($row['type'] == "tShirt") {
                    $tShirts[] = $row;
                } elseif ($row['type'] == "skirt") {
                    $skirts[] = $row;
                } elseif ($row['type'] == "trousers") {
                    $trousers[] = $row;
                } elseif ($row['type'] == "blazer") {
                    $blazers[] = $row;
                } elseif ($row['type'] == "accessory") {
                    $accessories[] = $row;
                }
            }
        }
        $mysql->close();
    ?>
    
    <header>
        <div id="darkerID" class="darker">
            <div class="nav" id="mini_header">
                <a href="index.html"><img src="images/logo_tsezelen_full2_gradient_sqr.png" class="logo_full"></a>
                <a href="index.html"><img src="images/logo_tsezelen_full2_black_description.png" class="logo_inscription"></a>
                <div class="burger_menu_icon">
                    <div id="st1" class="stick"></div>
                    <div id="st2" class="stick"></div>
                    <div id="st3" class="stick"></div>
                </div>
                <div class="naver">
                    <a href="index.html"><div class="parallelogram"><p class="p_naver">Главная</p></div></a>
                    <a href="index.html"><div class="parallelogram"><p class="p_naver">Зал гардероба напрокат</p></div></a>
                    <a href="index.html"><div class="parallelogram"><p class="p_naver">Лупа <br> эстета</p></div></a>
                </div>
            </div>
            <div class="burger_menu">
                <a href="index.html" class="bigger_burger_a">ГЛАВНАЯ</a>
                <a href="catalog.php" class="bigger_burger_a">ЗАЛ ГОТОВЫХ РАБОТ</a>
                <a href="index.html" class="bigger_burger_a">ЗАЛ ГАРДЕРОБА НАПРОКАТ</a>
                <div class="smaller">
                    <a href="index.html" class="burger_a">ЛУПА ЭСТЕТА</a>
                    <a onclick="backwards()" href="#footer_contacts" class="burger_a scroll">КОНТАКТЫ</a>
                    <a href="index.html" class="burger_a">ОТЗЫВЫ</a>
                </div>
            </div>
            <?php
                if (isset($_GET['id']) && isset($_GET['more'])) {
                    echo 
                        '
                        <div class="card_menu">
                            <div class="nav_card_menu">
                                <div class="nav_card_menu_text">
                                    <h3>'.$goods[$_GET["id"]-1]["name"].'</h3>
                                    <a href="http://tsezelenfasiongallery/catalog.php?id='.$_GET["id"].'"><img src="images/back.png" class="back_img"></a>
                                </div>
                            </div>
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide" style="background-image: url(images/Default_photo.jpg);"></div>
                                    <div class="swiper-slide" style="background-image: url(images/Default_photo3.jpg);"></div>
                                    <div class="swiper-slide" style="background-image: url(images/Default_photo2.jpg);"></div>
                                    <div class="swiper-slide" style="background-image: url(images/Default_photo.jpg);"></div>
                                    <div class="swiper-slide" style="background-image: url(images/Default_photo3.jpg);"></div>
                                    <div class="swiper-slide" style="background-image: url(images/Default_photo2.jpg);"></div>
                                </div>
                                <div class="swiper-pagination swiper-pagination-white"></div>
                                <div class="swiper-button-next swiper-button-white"></div>
                                <div class="swiper-button-prev swiper-button-white"></div>
                            </div>
                            
                            <div style="height: 2000px; width: 100vw; background-color: #ffffff;"></div>
                        </div>
                        
                        ';
                }
            ?>
            
        </div>
    </header>
    <main>
        <a href="#darkerID" class="scrollToTop scroll"><img class="imgToTop" src="images/strelka_rjfnfkmhm72a_64.png"></a>
        <div class="sidebar" aria-hidden="false">
            <h1 class="sidebar_h1" onclick="transformSidebarH1()">ЗАЛ ГОТОВЫХ РАБОТ <img class="arrow" src="images/strelka_rjfnfkmhm72a_64.png"></h1>
            <ul class="sidebar_ul">
                <a href="#toShirt" class="scroll"><li>Нескучные белые рубашки</li></a>
                <a href="#toTShirt" class="scroll"><li>Арт футболки</li></a>
                <a href="#toSkirt" class="scroll"><li>Юбки</li></a>
                <a href="#toTrousers" class="scroll"><li>Брюки</li></a>
                <a href="#toBlazer" class="scroll"><li>Блейзеры</li></a>
                <a href="#toAccessories" class="scroll"><li>Аксессуары</li></a>
            </ul>
            
        </div>
        <div class="line_big" style="margin-top: 10px;"></div>
        <div class="catalog">
            <div class="label" id="toShirt"></div>
            <div id="shirt" class="wrap">
                <h2>Нескучные белые рубашки</h2>
                <?php
                    if (count($shirts) > 0) {
                        foreach ($shirts as $shirt) {
                            echo
                            '<div class="card" id="card'.$shirt["id"].'">
                                <img src="'.$shirt["img"].'" class="img_card">
                                <h3>'.$shirt["name"].'</h3>
                                <p class="price">'.$shirt["price"].' р.</p>
                                <p class="description_card">'.$shirt["description"].'</p>
                                <a href="http://tsezelenfasiongallery/catalog.php?id='.$shirt["id"].'&more=true" class="button_card">ПОДРОБНЕЕ</a>
                            </div>';
                        }
                    } else {
                        echo
                        '<div class="card_warning">
                            <img src="images/error_no.png" class="img_warning">
                            <p class="description_card_warning">К сожалению, эта модель одежды сейчас распродана, но мы уже шьём новые партии, которые скоро появятся в продаже!</p>
                        </div>';
                    }
                    
                ?>
                
            </div>
            <div class="label" id="toTShirt"></div>
            <div id="tShirt" class="wrap">
                <h2>Арт футболки</h2>
                <?php
                    if (count($tShirts) > 0) {
                        foreach ($tShirts as $shirt) {
                            echo
                            '<div class="card" id="card'.$shirt["id"].'">
                                <img src="'.$shirt["img"].'" class="img_card">
                                <h3>'.$shirt["name"].'</h3>
                                <p class="price">'.$shirt["price"].' р.</p>
                                <p class="description_card">'.$shirt["description"].'</p>
                                <a href="http://tsezelenfasiongallery/catalog.php?id='.$shirt["id"].'&more=true" class="button_card">ПОДРОБНЕЕ</a>
                            </div>';
                        }
                    } else {
                        echo
                        '<div class="card_warning">
                            <img src="images/error_no.png" class="img_warning">
                            <p class="description_card_warning">К сожалению, эта модель одежды сейчас распродана, но мы уже шьём новые партии, которые скоро появятся в продаже!</p>
                        </div>';
                    }    
                ?>
            </div>
            <div class="label" id="toSkirt"></div>
            <div id="skirt" class="wrap">
                <h2>Юбки</h2>
                <?php
                    if (count($skirts) > 0) {
                        foreach ($skirts as $shirt) {
                            echo
                            '<div class="card" id="card'.$shirt["id"].'">
                                <img src="'.$shirt["img"].'" class="img_card">
                                <h3>'.$shirt["name"].'</h3>
                                <p class="price">'.$shirt["price"].' р.</p>
                                <p class="description_card">'.$shirt["description"].'</p>
                                <a href="http://tsezelenfasiongallery/catalog.php?id='.$shirt["id"].'&more=true" class="button_card">ПОДРОБНЕЕ</a>
                            </div>';
                        }
                    } else {
                        echo
                        '<div class="card_warning">
                            <img src="images/error_no.png" class="img_warning">
                            <p class="description_card_warning">К сожалению, эта модель одежды сейчас распродана, но мы уже шьём новые партии, которые скоро появятся в продаже!</p>
                        </div>';
                    }
                ?>
            </div>
            <div class="label" id="toTrousers"></div>
            <div id="trousers" class="wrap">
                <h2>Брюки</h2>
                <?php
                    if (count($trousers) > 0) {
                        foreach ($trousers as $shirt) {
                            echo
                            '<div class="card" id="card'.$shirt["id"].'">
                                <img src="'.$shirt["img"].'" class="img_card">
                                <h3>'.$shirt["name"].'</h3>
                                <p class="price">'.$shirt["price"].' р.</p>
                                <p class="description_card">'.$shirt["description"].'</p>
                                <a href="http://tsezelenfasiongallery/catalog.php?id='.$shirt["id"].'&more=true" class="button_card">ПОДРОБНЕЕ</a>
                            </div>';
                        }
                    } else {
                        echo
                        '<div class="card_warning">
                            <img src="images/error_no.png" class="img_warning">
                            <p class="description_card_warning">К сожалению, эта модель одежды сейчас распродана, но мы уже шьём новые партии, которые скоро появятся в продаже!</p>
                        </div>';
                    }
                ?>
            </div>
            <div class="label" id="toBlazer"></div>
            <div id="blazer" class="wrap">
                <h2>Блейзеры</h2>
                <?php
                    if (count($blazers) > 0) {
                        foreach ($blazers as $shirt) {
                            echo
                            '<div class="card" id="card'.$shirt["id"].'">
                                <img src="'.$shirt["img"].'" class="img_card">
                                <h3>'.$shirt["name"].'</h3>
                                <p class="price">'.$shirt["price"].' р.</p>
                                <p class="description_card">'.$shirt["description"].'</p>
                                <a href="http://tsezelenfasiongallery/catalog.php?id='.$shirt["id"].'&more=true" class="button_card">ПОДРОБНЕЕ</a>
                            </div>';
                        }
                    } else {
                        echo
                        '<div class="card_warning">
                            <img src="images/error_no.png" class="img_warning">
                            <p class="description_card_warning">К сожалению, эта модель одежды сейчас распродана, но мы уже шьём новые партии, которые скоро появятся в продаже!</p>
                        </div>';
                    } 
                ?>
            </div>
            <div class="label" id="toAccessories"></div>
            <div id="accessories" class="wrap">
                <h2>Аксессуары</h2>
                <?php
                    if (count($accessories) > 0) {
                        foreach ($accessories as $shirt) {
                            echo
                            '<div class="card" id="card'.$shirt["id"].'">
                                <img src="'.$shirt["img"].'" class="img_card">
                                <h3>'.$shirt["name"].'</h3>
                                <p class="price">'.$shirt["price"].' р.</p>
                                <p class="description_card">'.$shirt["description"].'</p>
                                <a href="http://tsezelenfasiongallery/catalog.php?id='.$shirt["id"].'&more=true" class="button_card">ПОДРОБНЕЕ</a>
                            </div>';
                        }
                    } else {
                        echo
                        '<div class="card_warning">
                            <img src="images/error_no.png" class="img_warning">
                            <p class="description_card_warning">К сожалению, эта модель одежды сейчас распродана, но мы уже шьём новые партии, которые скоро появятся в продаже!</p>
                        </div>';
                    }
                ?>
            </div>
        </div>
    </main>
    <footer id="footer_contacts">
        <div class="indent_footer">
            <img src="images/logo_tsezelen_full2_gradient_horiz_png.png" class="footer_logo">
            <h4>Контактная информация</h4>
            <div class="footer_string"><img src="images/pngegg.png" class="img_contact_footer"><p class="footer_p">+7 924 307 67 07</p></div>
            <div class="footer_string"><img src="images/pngwing.com.png" class="img_contact_footer"><p class="footer_p">tsezhel@mail.ru</p></div>
            <div class="footer_string"><img src="images/free-icon-pin-map-4230161.png" class="img_contact_footer"><p class="footer_p">г. Хабаровск, ул. Какая-то-там, 52</p></div>
            <h4>Социальные сети</h4>
            <h4>Документы</h4>
        </div>
    </footer>
    <script>
        <?php
            if (isset($_GET['id'])) {
                echo 'document.querySelector("#card'.$_GET["id"].'").scrollIntoView();';
            } 
            if (isset($_GET['id']) && isset($_GET['more'])) {
                echo 'document.querySelector(".card_menu").style.transform = "translateX(0px)"'; 
            }

        ?>
    </script>
    <script src="swiper-bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>