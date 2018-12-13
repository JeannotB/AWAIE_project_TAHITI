<?php 
    session_start();
    require ('../controllers/sql.php');

    $news = get_news_front_page(1);