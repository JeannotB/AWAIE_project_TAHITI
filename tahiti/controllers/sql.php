<?php

function get_temp($limit = INF, $id = 'default')
{
    require '../models/db_connection.php';

    $data = null;

    if ($id === 'default') {
        if($limit === INF){
            $sql_request = "SELECT * FROM capteur";
        }   
        else {
            $sql_request = "SELECT * FROM capteur LIMIT " . $limit . "";
        }
    } else {
        if($limit === INF) {
            $sql_request = "SELECT * FROM capteur WHERE sonde_id = '" . $id . "'";
        }
        $sql_request = "SELECT * FROM capteur WHERE sonde_id = '" . $id . "' LIMIT " . $limit . "";
    }

    $result = mysqli_query($sqlconnect, $sql_request);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

function get_members($id = 'default')
{
    require '../models/db_connection.php';

    $data = null;

    if ($id === 'default') {
        $sql_request = "SELECT * FROM members";
    } else {
        $sql_request = "SELECT * FROM members WHERE member_id = '" . $id . "'";
    }

    $result = mysqli_query($sqlconnect, $sql_request);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

function get_entreprise($id = 'default')
{
    require '../models/db_connection.php';

    $data = null;

    if ($id === 'default') {
        $sql_request = "SELECT * FROM entreprise";
    } else {
        $sql_request = "SELECT * FROM entreprise WHERE md5(company_id) = '" . $id . "'";
    }

    $result = mysqli_query($sqlconnect, $sql_request);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

function get_alertes($id = 'default')
{
    require '../models/db_connection.php';

    $data = null;

    if ($id === 'default') {
        $sql_request = "SELECT * FROM alertes";
    } else {
        $sql_request = "SELECT * FROM alertes WHERE alert_id = '" . $id . "'";
    }
    $result = mysqli_query($sqlconnect, $sql_request);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

function get_all_news($id = 'default')
{
    require '../models/db_connection.php';

    $data = null;

    if ($id === 'default') {
        $sql_request = "SELECT * FROM news";
    } else {
        $sql_request = "SELECT * FROM news WHERE news_id = '" . $id . "'";
    }

    $result = mysqli_query($sqlconnect, $sql_request);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

function get_news_front_page($limit = INF)
{
    require '../models/db_connection.php';

    $data = null;

    if($limit === INF){
        $sql_request = "SELECT * FROM news WHERE is_online = true ORDER BY date DESC";
    }   
    else {
        $sql_request = "SELECT * FROM news WHERE is_online = true ORDER BY date DESC LIMIT " . $limit . "";
    }

    $result = mysqli_query($sqlconnect, $sql_request);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

function get_offers_all()
{
    require '../models/db_connection.php';

    $data = null;

    $sql_request = "SELECT offer_id, title, description, date_offer, name, date_takeout, localisation,  type
                    FROM recruit 
                    INNER JOIN members on recruit.author_id = members.member_id
                    WHERE recruit.is_online = true 
                    ORDER BY date_offer DESC";

    $result = mysqli_query($sqlconnect, $sql_request);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

function get_offer($id)
{
    if($id == null)
        return -1;

    require '../models/db_connection.php';

    $data = null;

    $sql_request = "SELECT offer_id, title, description, date_offer, name, date_takeout, localisation,  type
                    FROM recruit 
                    INNER JOIN members on recruit.author_id = members.member_id
                    WHERE recruit.is_online = true AND offer_id = '". $id ."'
                    ORDER BY date_offer DESC";
    $result = mysqli_query($sqlconnect, $sql_request);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

function get_produits($id = 'default')
{
    require '../models/db_connection.php';

    $data = null;

    if ($id === 'default') {
        $sql_request = "SELECT * FROM produits";
    } else {
        $sql_request = "SELECT * FROM produits WHERE md5(id_produit) = '" . $id . "'";
    }

    $result = mysqli_query($sqlconnect, $sql_request);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

function get_produits_and_temp($id_produit = 'default')
{
    require '../models/db_connection.php';

    $data_temp = get_temp();
    $data_produit = get_produits($id_produit);

    $data = $data_produit;

    $array2remove = null;

    //Associate $data_entreprise with $data_produit
    array_walk($data_temp, function ($item) use (&$data) {
        array_walk($data, function (&$elem) use ($item) {
            if ($item['sonde_id'] == $elem['id_produit']) {
                unset($item['sonde_id']);
                $elem['temp'][] = $item;
            }
        });
    });

    $data = array_values($data);

    return $data;
}

function get_entreprise_and_produits($id_entreprise = 'default')
{
    require '../models/db_connection.php';

    $data = null;

    $data_produit = get_produits();
    $data_entreprise = get_entreprise($id_entreprise);

    $array2remove = null;

    array_walk($data_produit, function (&$item) use ($data_entreprise, $id_entreprise, &$array2remove) {
        $value = $item['id_entreprise'];
        if ($value != $id_entreprise && $id_entreprise != 'default') {
            $array2remove[] = $item['id_produit'];
        } else {
            $key = array_search($value, array_column($data_entreprise, 'company_id'));
            $item['company'] = $data_entreprise[$key];
            unset($item['id_entreprise']);
        }
    });

    if ($id_entreprise != 'default') {
        foreach ($array2remove as $elem) {
            unset($data_produit[$elem - 1]);
        }
    }

    $data = array_values($data_produit);

    return $data;
}

function get_entreprise_produits_temp($limit_temp = INF, $id_entreprise = 'default')
{
    require '../models/db_connection.php';

    $data_produit = get_produits();
    $data_entreprise = get_entreprise($id_entreprise);
    $data_temp = array_reverse(get_temp());

    $data = $data_entreprise;

    //Associate $data_entreprise with $data_produit
    array_walk($data, function (&$item) use ($data_produit) {
        array_walk($data_produit, function ($elem) use (&$item) {
            if ($elem['id_entreprise'] == $item['company_id']) {
                $item['produit'][] = array_slice($elem, 0, 6);
            }
        });
    });

    //Associate $data_entreprise with $data_temp
    array_walk($data, function (&$item) use ($data_temp, $limit_temp) {
        array_walk($item['produit'], function (&$val) use ($data_temp, $limit_temp) {
            $i = 0;
            array_walk($data_temp, function ($elem) use (&$val, $limit_temp, &$i) {
                if ($elem['sonde_id'] == $val['id_produit'] && $i < $limit_temp) {
                    unset($elem['sonde_id']);
                    $val['temp'][] = $elem;
                    $i++;
                }
            });

        });
    });

    return $data;
}

function get_entreprise_produits_alertes($limit_alerts = INF, $id_entreprise = 'default')
{
    require '../models/db_connection.php';

    $data = null;

    if ($id_entreprise === 'default') {
        if($limit_alerts === INF){
            $sql_request = "SELECT * FROM alertes JOIN produits, entreprise WHERE alertes.sonde_id=produits.id_produit AND produits.id_entreprise=entreprise.company_id AND alertes.is_display=1 ORDER BY time DESC ";
        }
        else {
             $sql_request = "SELECT * FROM alertes JOIN produits, entreprise WHERE alertes.sonde_id=produits.id_produit AND produits.id_entreprise=entreprise.company_id AND alertes.is_display=1 ORDER BY time DESC LIMIT ". $limit_alerts . "";
        }
       
    } else {
        if($limit_alerts === INF) {
            $sql_request = "SELECT * FROM alertes JOIN produits, entreprise WHERE alertes.sonde_id=produits.id_produit AND produits.id_entreprise=entreprise.company_id AND md5(entreprise.company_id)='" . $id_entreprise . "' AND alertes.is_display=1 ORDER BY time DESC ";
        }
        else {
            $sql_request = "SELECT * FROM alertes JOIN produits, entreprise WHERE alertes.sonde_id=produits.id_produit AND produits.id_entreprise=entreprise.company_id AND md5(entreprise.company_id)='" . $id_entreprise . "' AND alertes.is_display=1 ORDER BY time DESC LIMIT ". $limit_alerts . "";
        }
        
    }

    $result = mysqli_query($sqlconnect, $sql_request);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = array("id" =>$row ['alert_id'], "sonde_id" => $row['sonde_id'], 'date' => $row['time'], 'name' => $row['ref_produit'], 'temp' => $row['temp']);
    }

    return $data;
}

function get_entreprise_member($id_member)
{
    require '../models/db_connection.php';

    $data = null;

    $data_member = get_members($id_member);
    $data_entreprise = get_entreprise();

    $data = $data_member;

    array_walk($data, function (& $item) use ($data_entreprise) {
        array_walk($data_entreprise, function ($elem) use (& $item) {
            if ($elem['company_id'] == $item['id_company']) {
                $item['company'] = $elem;
            }
        });
    });

    return $data;
}

function update_produit($data, $id)
{
    require '../models/db_connection.php';

    $sql_request = "UPDATE produits SET ref_produit = '".$data['ref_produit']."',
                                        GPS_lat = '".$data['GPS_lat']."',
                                        GPS_long = '".$data['GPS_long']."',
                                        alerte_sup = '".$data['alerte_sup']."',
                                        alerte_inf = '".$data['alerte_inf']."'
                                    WHERE md5(id_produit) = '".$id."'";
    if(mysqli_query($sqlconnect, $sql_request)) {
        $error = "Settings changed";
    }
    else
        $error = "Error: " . $sql_request . " " . mysqli_error($sqlconnect);

    return $error;
}

function update_news($data, $id)
{
    require '../models/db_connection.php';

    $sql_request = "UPDATE news SET title = '" . $data['title'] . "',
                                    description = '" . $data['description'] . "',
                                    is_online = '" . $data['online'] . "',
                                    date = '" . $data['date'] . "'
                                    WHERE news_id = '" . $id . "'";
    
    if (mysqli_query($sqlconnect, $sql_request)) {
        $error = "News Update";
    } else {
        $error = "Error: " . $sql_update_news . " " . mysqli_error($sqlconnect);
    }

    return $error;
}

function insert_news($data)
{
    require '../models/db_connection.php';

    $sql_request = "INSERT INTO news (title, description, is_online, date)
                VALUES ('" . $data['title'] . "','" . $data['description'] . "','" . $data['online'] . "','" . $data['date'] . "')";

    if (mysqli_query($sqlconnect, $sql_request)) {
        $error = "News successfully post";
    } else {
        $error = "Error: " . $sql . "" . mysqli_error($sqlconnect);
    }

    return $error;
}

function update_member($data, $id)
{
    require '../models/db_connection.php';

    $sql_request = "UPDATE members SET name = '".$data['name']."',
                                       email = '".$data['email']."'
                                   WHERE member_id = $id";
    
    if (mysqli_query($sqlconnect, $sql_request)) {
        $error = "News Update";
    } else {
        $error = "Error: " . $sql_update_news . " " . mysqli_error($sqlconnect);
    }

    return $error;
}