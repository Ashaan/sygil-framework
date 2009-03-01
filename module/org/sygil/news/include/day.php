<?php

class NewsDaily {
    private $event   = null;
    private $content = array();
    private $dayList = array(
        1 => 'Lundi',
        2 => 'Mardi',
        3 => 'Mercredi',
        4 => 'Jeudi',
        5 => 'Vendredi',
        6 => 'Samedi',
        7 => 'Dimanche',
    );
    private $monthList = array(
        01  => 'Janvier',
        02  => 'Février',
        03  => 'Mars',
        04  => 'Avril',  
        05  => 'Mai',
        06  => 'Juin',
        07  => 'Juillet',
        08  => 'Aout',
        09  => 'Septembre',
        10  => 'Octobre',
        11  => 'Novembre',
        12  => 'Décembre',
    );

    public function __construct($event) {
        $this->event = $event;
    }

    private function date($date) {
        return $this->dayList[date('N',$date)].' '.date('j',$date).' '.$this->monthList[date('n',$date)].' '.date('Y',$date);
    }
    private function time($time) {
        return date('G:i',$time);
    }

    public function generate() {
        $content = '';
        $days = $this->event->getDays();
        foreach($days as $date => $day) {
            $events = '';
            $alt  = 0;
            foreach($day as $event) {
                $data = array(
                    '__ID__'      => convert_datetime($event['firstdate']),
                    '__TITLE__'   => $event['title'],
                    '__DATE__'    => $this->time($event['firstdate']),
                    '__AUTHOR__'  => $event['login'], 
                    '__CONTENT__' => $event['text'],
                    '__ALT__'     => $alt,
                    '__ACTION__'  => $event['edit']?'<img src="module/news/theme/default/edit.png" onclick="newsEdit(\''.convert_datetime($event['firstdate']).'\')" height=28/>':'',
                );
                $alt = !$alt;
                if ($event['text']) {
                    $events .= Template::getInstance()->get('long',$data,'org.sygil.news');
                } else {
                    $events .= Template::getInstance()->get('short',$data,'org.sygil.news');
                }
            }
            $data = array(
                '__TITLE__'   => $this->date($date),
                '__CONTENT__' => $events,
            );
            $content .= Template::getInstance()->get('day',$data,'org.sygil.news');
        }

        return $content;
    }
}

?>
