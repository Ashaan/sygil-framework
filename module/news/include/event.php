<?php

function convert_datetime($str) {
    list($date, $time) = explode(' ', $str);
    list($year, $month, $day) = explode('-', $date);
    list($hour, $minute, $second) = explode(':', $time);
    
    $timestamp = mktime($hour, $minute, $second, $month, $day, $year);
  
    return $timestamp;
}

class NewsEvents {
    private $zone  = 0;
    private $date  = null;
    private $event = array();
    private $day   = array();
    private $last  = true;

    public function __constructor($zone) {
        $this->zone = $zone;
    }
 
    public function setDate($date) {
        $this->date = $date;
        $this->last = false;
    }

    public function save($id, $title, $text) {
        if (is_int($id)) {
            $id = date();
        }
        $query ='';
    }
    public function load() {
        $db = db::getInstance();
        $session = Session::getInstance();

        $addsql = '';
        if ($this->date) {
            $addsql .= '
                AND N.firstdate >= "'.date('Y-m-d 00:00:00',$this->date).'"
                AND N.firstdate <= "'.date('Y-m-d 23:59:59',$this->date).'"
            ';            
        }
        $addsql .= '
            ORDER BY firstdate DESC
        ';
        if ($this->last) {
            $addsql .= '
            LIMIT 0,20
            ';
        }
        $query  = '
            SELECT N.title, N.text, U.login, N.firstdate, U.id as userId
            FROM news N 
              LEFT JOIN user U ON U.id = N.firstauthor 
            WHERE N.zone='.$this->zone.'
        '.$addsql;

        $result = $db->select($query);
        foreach($result as $obj){
            $obj['edit'] = false;

            if ($session->isLogged()) { 
                $user = $session->getUser('id'); 
                if ($user==$obj['userId']) {
                    $obj['edit'] = true;
                }
            }

            $this->event[convert_datetime($obj['firstdate'])] = $obj;

            $day = substr($obj['firstdate'],0,strpos($obj['firstdate'],' ')).' 00:00:00';
            if (!$this->day[convert_datetime($day)]) {
                $this->day[convert_datetime($day)] = array();
            } 
            $this->day[convert_datetime($day)][] = $obj;
        }
    }

    public function getDays() {
        return $this->day;
    }

}

?>
