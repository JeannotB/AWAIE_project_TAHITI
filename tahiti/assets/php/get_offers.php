<?php
    //Get news

    //Need database connection
    require './assets/php/db_connection.php';

    //Structure news_array
    $job_array = array ('title', 'description', 'date_offer', 'author', 'date_takeout', 'localisation', 'type' );

    //Get News
    $sql_get_offers = "SELECT * FROM recruit WHERE is_online = true ORDER BY date_offer DESC";
    $result = mysqli_query($sqlconnect, $sql_get_offers);
    while ($row = mysqli_fetch_assoc($result)) {
        $job_array['title'][] = $row['title'];
        $job_array['description'][] = $row['description'];
        $job_array['date_offer'][] = $row['date_offer'];
        $job_array['author'][] = $row['author_id'];
        $job_array['date_takeout'][] = $row['date_takeout'];
        $job_array['localisation'][] = $row['localisation'];
        $job_array['type'][] = $row['type'];
    }
?>