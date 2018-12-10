<?php
    session_start();
    require '../controllers/sql.php';

    if (isset($_POST['submit'])) {
        $news = [
            'id' => $_POST['news_id'],
            'title' => $_POST['news_title'],
            'description' => $_POST['news_description'],
            'online' => (isset($_POST['news_online']) ? 1 : 0), //Value : ON (true) / NULL (false)
            'date' => $today = date("Y-m-d H:i:s"),
        ];

        //if id is non-empty => Need to update an existant news
        if ($news['id'] != "") {
            //Browse the news from his id

            $verify_id = get_news();
            

            foreach($verify_id as $elem) {
                if($elem['news_id'] == $news['id']) {
                    $error = update_news($news, $elem['news_id']);
                }
            }
        } else {
            //Insert into the database
            $error = insert_news($news);
        }

    }

    $news = [
        'id' => [],
        'title' => [],
        'description' => [],
        'online' => [],
        'date' => [],
    ];

    $data = get_news();

    foreach($data as $elem) {
        $news['id'][] = $elem['news_id'];
        $news['title'][] = $elem['title'];
        $news['description'][] = $elem['description'];
        $news['online'][] = $elem['is_online'];
        $news['date'][] = $elem['date'];
    }
