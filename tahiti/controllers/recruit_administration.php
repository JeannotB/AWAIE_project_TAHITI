<?php
    session_start();
    require '../controllers/sql.php';
    require '../models/session.php';

    $error = '';
    $author_id = '';
    if (isset($_POST['submit'])) {
        $offer = [
            'id' => $_POST['offer_id'],
            'author_id' => get_members($_SESSION['token'])[0]['member_id'],
            'title' => str_replace(',', '', str_replace("'", '', $_POST['offer_title'])),
            'description' => str_replace(',', '\,', str_replace("'", "\'", $_POST['offer_description'])),
            'online' => (isset($_POST['offer_online']) ? 1 : 0), //Value : ON (true) / NULL (false)
            'date_offer' => $today = date("Y-m-d H:i:s"),
            'type' => $_POST['offer_type'],
            'localisation' => str_replace(',', '\,', str_replace("'", "\'", $_POST['offer_localisation'])),
            'date_takeout' => $_POST['offer_datetakeout'],
        ];


        //if id is non-empty => Need to update an existant news
        if ($offer['id'] != "") {
            //Browse the news from his id

            $verify_id = get_all_offer();
            

            foreach($verify_id as $elem) {
                if($elem['offer_id'] == $offer['id']) {
                    $error = update_offer($offer, $elem['offer_id']);
                }
            }
        } else {
            //Insert into the database
            $error = insert_offer($offer);
        }

    }

    $offer = [
        'id' => [],
        'author_id' => [],
        'title' => [],
        'description' => [],
        'online' => [],
        'date_offer' => [],
        'type' => [],
        'localisation' => [],
        'date_takeout' => [],
    ];

    $data = get_all_offer();

    foreach($data as $elem) {
        $offer['id'][] = $elem['offer_id'];
        $offer['author_id'][] = $elem['author_id'];
        $offer['title'][] = $elem['title'];
        $offer['online'][] = $elem['is_online'];
        $offer['date_offer'][] = $elem['date_offer'];
        $offer['description'][] = $elem['description'];
        $offer['type'][] = $elem['type'];
        $offer['localisation'][] = $elem['localisation'];
        $offer['date_takeout'][] = $elem['date_takeout'];
    }