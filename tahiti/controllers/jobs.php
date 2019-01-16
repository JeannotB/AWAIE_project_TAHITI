<?php
require ('../controllers/sql.php');




if (isset($_GET['id_job']))
{
    $job_id = $_GET['id_job'];
    $job_array = get_offer($job_id);
}
else {
    header('Location: ./recruit');
    exit(); 
}