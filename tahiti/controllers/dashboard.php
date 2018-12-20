<?php 
    session_start();
    require ('../controllers/sql.php');
    require '../models/session.php';

    //get company id
    if(isset($_GET['id_company']))
        $company_id = $_GET['id_company'];
    else
        $company_id = null;

    $data = get_entreprise_produits_temp(10,$company_id);
    $data_alerts = get_entreprise_produits_alertes(10, $company_id);