<?php
session_start();
require ('../controllers/sql.php');
require ('../models/session.php');

$data = get_entreprise_produits_temp(10);
$data_alerts = get_entreprise_produits_alertes();