<?php
    require './assets/php/db_connection.php';
//All functions in php usefull
    //Class GPS
    class gps_position {
        private $lat;
        private $long;

        public function set_gps_postion($a, $b) {
            $this->lat = $a;
            $this->long = $b;
        }

    }
    class sensor {
        private $id;
        private $gps = new gps_position;
        private $temp[];
    }




    //GET ALL DATA FROM 1 SENSOR


    //GET GPS POSITION FROM A SENSOR
    function get_position_of_a_sensor($id_sensor) {
        $sql_get_gps = "SELECT * FROM produits WHERE ref_produit='".$id_sensor."'";
        $result = mysqli_query($sqlconnect, $sql_get_gps);
        $row = mysqli_fetch_assoc($result);
        
    }


?>