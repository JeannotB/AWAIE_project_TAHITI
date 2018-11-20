<?php
    //Get news

    //Need database connection
    require './assets/php/db_connection.php';

    //Structure news_array
    $news_array = array ('title', 'description', 'date');

    //Get News
    $sql_get_news = "SELECT * FROM news WHERE is_online = true ORDER BY date DESC";
    $result = mysqli_query($sqlconnect, $sql_get_news);
    while ($row = mysqli_fetch_assoc($result)) {
        $news_array['title'][] = $row['title'];
        $news_array['description'][] = $row['description'];
        $news_array['date'][] = $row['date'];
    }
?>
