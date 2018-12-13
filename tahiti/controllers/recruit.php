<?php
    require ('../controllers/sql.php');

    $job_array = get_offers_all();

    if (isset($_GET['id_job']))
        $job_id = $_GET['id_job'];
    else
        $job_id = 0;

    $job_max = count($job_array);

    if ($job_id < 0 || $job_id >= $job_max)
        $job_id = 0;

    $number_offers_displayed = 3;

    $first_job_id = $job_id;

    $last_job_id = $first_job_id + $number_offers_displayed;

    if ($last_job_id > $job_max)
        $last_job_id = $job_max;

    //Send mail if CandidatureSpontannée was complete

/*
    echo "<pre>";
    print_r($job_array);
    echo "</pre>";*/