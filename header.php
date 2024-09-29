<!DOCTYPE html>
<html <?php language_attributes(); ?>>


<head><?php wp_head(); ?></head>

<body>
    <header>
        <div class="header-container">
            <div class="header-menu">
                <ul class="date">
                    <li class="current-date">
                        <i class="fa-regular fa-calendar-days calendar-icon"></i>
                        <?php
                        date_default_timezone_set('Europe/Kiev');
                        $currentDate = date('l, d F Y');
                        echo "<p>$currentDate</p>";
                        ?>
                    </li>
                    <li class="current-time">
                        <p id="time"></p>
                    </li>
                </ul>
                <div class="socials">
                    <p>Follow Us <img src="" alt=""></p>
                    <ul>
                        <li><a href=""><i class="fa-brands fa-facebook fa-2x"></i></a></li>
                        <li><a href=""></a><i class="fa-brands fa-twitter fa-2x"></i></li>
                        <li><a href=""></a><i class="fa-brands fa-google-plus-g fa-2x"></i></li>
                        <li><a href=""></a><i class="fa-brands fa-linkedin fa-2x"></i></li>
                    </ul>
                </div>
            </div>
            <div class="banner">
                <div class="banner-container">
                    <h1 class="site-title">Newsio</h1>
                    <p class="site-description">Newsio is a clean, modern blog news and magazine WordPress theme that is perfect for any Blog/Magazine, news, and even for all variants of publishers websites.</p>

                </div>
            </div>
        </div>
    </header>