<?php
session_start();
require ('../controllers/sql.php');

$data = get_entreprise_produits_temp(10);
$data_alerts = get_entreprise_produits_alertes();