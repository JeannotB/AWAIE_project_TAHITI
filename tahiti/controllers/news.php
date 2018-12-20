<?php 
    session_start();
    require ('../controllers/sql.php');

    $news_array = get_news_front_page();

    if (isset($_GET['id_news']))
		$news_id = $_GET['id_news'];
	else
		$news_id = 0;

	$news_max = count($news_array['title']);

	if ($news_id < 0 || $news_id >= $news_max)
		$news_id = 0;

	if ($news_id == $news_max - 1)
		$news_id_after = $news_id;
	else
		$news_id_after = $news_id + 1;

	if ($news_id == 0)
		$news_id_before = $news_id;
	else
		$news_id_before = $news_id - 1;