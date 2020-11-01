<?php

class DateToFrench extends DateTime
{

    public function forma($format = 'j M Y')
    {
        $jourComplet = array(
            'Monday'    => 'Lundi',
            'Tuesday'   => 'Mardi',
            'Wednesday' => 'Mercredi',
            'Thursday'  => 'Jeudi',
            'Friday'    => 'Vendredi',
            'Saturday'  => 'Samedi',
            'Sunday'    => 'Dimanche'
        );
        $jourMoit = array(
            'Mon' => 'Lun',
            'Tue' => 'Mar',
            'Wed' => 'Mer',
            'Thu' => 'Jeu',
            'Fri' => 'Ven',
            'Sat' => 'Sam',
            'Sun' => 'Dim'
        );
        $moisComplet = array(
            'January'   => 'Janvier',
            'February'  => 'Février',
            'March'     => 'Mars',
            'April'     => 'Avril',
            'May'       => 'Mai',
            'June'      => 'Juin',
            'July'      => 'Juillet',
            'August'    => 'Août',
            'September' => 'Septembre',
            'October'   => 'Octobre',
            'November'  => 'Novembre',
            'December'  => 'Décembre'
        );
        $moisMoit = array(
            'Feb' => 'Fév',
            'Apr' => 'Avr',
            'May' => 'Mai',
            'Jun' => 'Juin',
            'Jul' => 'Juil',
            'Aug' => 'Août',
            'Dec' => 'Déc'
        );

        $date = parent::format($format);

        if (strstr($format, 'l')) {
            $date = str_replace(array_keys($jourComplet), array_values($jourComplet), $date);
        }
        if (strstr($format, 'D')) {
            $date = str_replace(array_keys($jourMoit), array_values($jourMoit), $date);
        }
        if (strstr($format, 'F')) {
            $date = str_replace(array_keys($moisComplet), array_values($moisComplet), $date);
        }
        if (strstr($format, 'M')) {
            $date = str_replace(array_keys($moisMoit), array_values($moisMoit), $date);
        }

        return $date;
    }
}
