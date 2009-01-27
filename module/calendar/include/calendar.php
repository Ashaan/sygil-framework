<?php

class Calendar {
    private static $Count = 1;
    private $date  = 0;
    private $zone  = 0;
    private $panel = null;
    private $event = array();
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

    public function __construct() {

    }
 
    public function setDate($date) {
        $this->date = $date;
    }
    public function setZone($zone) {
        $this->zone = $zone;
    }
    public function setPanel($panel) {
        $this->panel = $panel;
    }

    private function addDayLine($dayList, $day) {
        if ($dayList=='') return '';

        $data = array(
            '__WEEK__'  => date('W',$day)*1,
            '__LINE__'  => $dayList
        );
        return Template::getInstance()->get('line',$data,'calendar');
    }
    private function addDay($day) {
        $data = array(
            '__DAY__'   =>  date('j',$day)
        );
        return Template::getInstance()->get('day',$data,'calendar');
    }
    private function addDayCurrent($day) {
        $data = array(
            '__DAY__'   =>  date('j',$day)
        );
        return Template::getInstance()->get('day_current',$data,'calendar');
    }
    private function addDayEvent($day, $event) {
        $data = array(
            '__DAY__'   =>  date('j',$day),
            '__ACTION__'=>  'ajaxLoad(\'news\',\'panel_left\',\'replace\',[[\'zone\',0],[\'date\',\''.$event['date'].'\']]);',
        );

        return Template::getInstance()->get('day_event',$data,'calendar');
    }
    private function nextDay($day) {
       return mktime(0,0,0,date('n',$day),date('j',$day)+1,date('Y',$day));
    }
    private function checkMonth($ref,$day) {
        if (date('n',$ref)==date('n',$day)) {
            return true;
        } else {
            return false;
        }
    }
    private function checkDay($ref,$day) {
        if (date('j',$ref)==date('j',$day)) {
            return true;
        } else {
            return false;
        }
    }
    private function getEvent() {
        $config = Core::getInstance()->config['base'];
        $bdd = new mysqli($config['host'],$config['user'],$config['pass'],$config['name']);
        $query  = '
            SELECT firstdate, title 
            FROM news 
            WHERE zone='.$this->zone.'
              AND firstdate >= "'.date('Y-m-01 00:00:00',$this->date).'"
              AND firstdate <= "'.date('Y-m-31 23:59:59',$this->date).'"
        ';
        if ($result = $bdd->query($query)) {
            while($obj = $result->fetch_object()){
                $date  = $obj->firstdate;
                $date  = explode(' ',$date);
                $date  = $date[0];
                $day   = substr($date, strrpos($date,'-')+1);
                $date  = substr($date, 0, strrpos($date,'-'));

                $year  = substr($date, 0, strpos($date,'-'));
                $month = substr($date, strpos($date,'-')+1);


                if (!$this->event[$day]) {
                    $this->event[$day] = array(
                        'date'      => mktime(0,0,0,$month,$day,$year),
                        'title'     => array($obj->title),
                        'count'     => 1,
                    );
                } else {
                    $this->event[$day]['title'][] = $obj->title; 
                    $this->event[$day]['count']++;
                }
            }
        }
    }
    public function generate() {
        $first = mktime(12,0,0,date('n',$this->date),1,date('Y',$this->date));
        $jds   = date('N',$first);  

        $data = '';$line = '';
        for ($i=1;$i<$jds;$i++) {
            $line .= Template::getInstance()->get('day_empty',array(),'calendar');
        }

        $this->getEvent();
        $current = $first;$last = $first;
        while($this->checkMonth($this->date,$current)) {
            if ($this->checkDay($this->date,$current)) {
                $line .= $this->addDayCurrent($current);
            } else
            if ($this->event[date('d',$current)]) {
                $line .= $this->addDayEvent($current,$this->event[date('d',$current)]);
            } else {
                $line .= $this->addDay($current);
            }
            if (date('N',$current)==7) {
                $data .= $this->addDayLine($line,$current);
                $line = '';
            }
            $last    = $current;
            $current = $this->nextDay($current);
        }
        $data .= $this->addDayLine($line,$last);


        $data = array(
            '__MONTH__'    => $this->monthList[date('n',$this->date)],
            '__YEAR__'     => date('Y',$this->date),
            '__DAY__'      => $data, 
            '__ADDON__'    => '',
        );

//echo Template::getInstance()->get('calendar',$data,'calendar');
        return Template::getInstance()->get('calendar',$data,'calendar');
  }
}

?>
