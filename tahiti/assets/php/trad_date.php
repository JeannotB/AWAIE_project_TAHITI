<?php
    function trad_date($old_date) {
        $day_repre = strftime ('%w', strtotime($old_date));
        $day_number = strftime ('%d', strtotime($old_date));
        $month = strftime ('%m', strtotime($old_date));
        $year = strftime ('%Y', strtotime($old_date));
        $day_letter = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
        $month_letter = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
        
        return ($day_letter[$day_repre - 1] . ' ' . $day_number . ' ' . $month_letter[$month - 1] . ' ' . $year);
	}
?>
