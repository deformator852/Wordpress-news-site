<!DOCTYPE html>
<html <?php language_attributes(); ?>>


<head><?php wp_head(); ?></head>

<body>
    <header>
        <div class="header-container">
            <div class="header-menu">
                <ul>
                    <li class="current-date">
                        <img width="20px" height="20px" src="<?php echo get_template_directory_uri() ?>/assets/img/calendar.png">
                        <?php
                        date_default_timezone_set('Europe/Kiev');
                        $currentDate = date('l, d F Y');
                        echo $currentDate;
                        ?>
                    </li>
                    <li class="current-time">
                        <span>
                            <img width="21px" height="21px" src="<?php echo get_template_directory_uri() ?>/assets/img/clock.png" alt="">
                            <p id="time"></p>
                        </span>
                    </li>
                </ul>
            </div>
            <div class="banner"></div>
        </div>
    </header>