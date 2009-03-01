<?php

class Calendar {
    private static $Count = 1;
    private $date   = 0;
    private $module = null;
    private $panel  = null;
    private $type   = null;
    private $key    = null;
    private $event  = array();
    private $monthList = array(
         1  => 'Janvier',
         2  => 'Février',
         3  => 'Mars',
         4  => 'Avril',  
         5  => 'Mai',
         6  => 'Juin',
         7  => 'Juillet',
         8  => 'Aout',
         9  => 'Septembre',
        10  => 'Octobre',
        11  => 'Novembre',
        12  => 'Décembre',
    );

    public function __construct() {
    }
 
    public function setDate($date) {
        $this->date = $date;
    }
    public function setModule($module) {
        $this->module = $module;
    }
    public function setKey($key) {
        $this->key = $key;
    }
    public function setType($type) {
        $this->type = $type;
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
        return Template::getInstance()->get('line',$data,'org.sygil.calendar');
    }
    private function addDay($day) {
        $data = array(
            '__DAY__'   =>  date('j',$day)
        );
        return Template::getInstance()->get('day',$data,'org.sygil.calendar');
    }
    private function addDayCurrent($day) {
        $data = array(
            '__DAY__'   =>  date('j',$day)
        );
        return Template::getInstance()->get('day_current',$data,'org.sygil.calendar');
    }
    private function addDayEvent($day, $event) {
        $data = array(
            '__DAY__'   =>  date('j',$day),
            '__ACTION__'=>  'org.sygil.ajax.load(\''.$this->type.'\',\''.$this->panel.'\',\'replace\',[[\'module\',\''.$this->module.'\'],[\'date\','.$event['date'].']]);',
        );

        return Template::getInstance()->get('day_event',$data,'org.sygil.calendar');
    }
    private function addDayActive($day, $event) {
        $data = array(
            '__DAY__'   =>  date('j',$day),
            '__ACTION__'=>  'org.sygil.ajax.load(\''.$this->type.'\',\''.$this->panel.'\',\'replace\',[[\'module\',\''.$this->module.'\'],[\'date\','.$event['date'].']]);',
        );

        return Template::getInstance()->get('day_active',$data,'org.sygil.calendar');
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
    private function checkFullDay($ref,$day) {
        if (date('j n Y',$ref)==date('j n Y',$day)) {
            return true;
        } else {
            return false;
        }
    }
    private function getEvent() {
        $db = db::getInstance();
        $query  = '
            SELECT firstdate, title 
            FROM news 
            WHERE module_id="'.$this->module.'"
              AND firstdate >= "'.date('Y-m-01 00:00:00',$this->date).'"
              AND firstdate <= "'.date('Y-m-31 23:59:59',$this->date).'"
        ';
   
        $result = $db->select($query);
        if ($result) 
        foreach($result as $obj){
                $date  = $obj['firstdate'];
                $date  = explode(' ',$date);
                $date  = $date[0];
                $day   = substr($date, strrpos($date,'-')+1);
                $date  = substr($date, 0, strrpos($date,'-'));

                $year  = substr($date, 0, strpos($date,'-'));
                $month = substr($date, strpos($date,'-')+1);


                if (!$this->event[$day]) {
                    $this->event[$day] = array(
                        'date'      => mktime(0,0,0,$month,$day,$year),
                        'title'     => array($obj['title']),
                        'count'     => 1,
                    );
                } else {
                    $this->event[$day]['title'][] = $obj['title']; 
                    $this->event[$day]['count']++;
                }
         }
    }
    public function generate() {
        $first = mktime(12,0,0,date('n',$this->date),1,date('Y',$this->date));
        $jds   = date('N',$first);  

        $data = '';$line = '';
        for ($i=1;$i<$jds;$i++) {
            $line .= Template::getInstance()->get('day_empty',array(),'org.sygil.calendar');
        }

        $this->getEvent();
        $current = $first;$last = $first;
        while($this->checkMonth($this->date,$current)) {
            if ($this->checkFullDay(time(),$current)) {
                if ($this->event[date('d',$current)]) {
                    $line .= $this->addDayActive($current,$this->event[date('d',$current)]);
                } else {
                    $line .= $this->addDayCurrent($current);
                }
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
            '__MONTH__'     => $this->monthList[date('n',$this->date)],
            '__YEAR__'      => date('Y',$this->date),
            '__DAY__'       => $data, 
            '__ADDON__'     => '',
            '__PREV_MONTH__'=> 'org.sygil.ajax.load(\''.$this->key.'\',\'panel_right_row1\',\'replace\',[[\'module\',\''.$this->module.'\'],[\'date\','.mktime(12,0,0,date('n',$this->date)-1,date('d',$this->date),date('Y',$this->date)  ).']]);',
            '__NEXT_MONTH__'=> 'org.sygil.ajax.load(\''.$this->key.'\',\'panel_right_row1\',\'replace\',[[\'module\',\''.$this->module.'\'],[\'date\','.mktime(12,0,0,date('n',$this->date)+1,date('d',$this->date),date('Y',$this->date)  ).']]);',
            '__PREV_YEAR__' => 'org.sygil.ajax.load(\''.$this->key.'\',\'panel_right_row1\',\'replace\',[[\'module\',\''.$this->module.'\'],[\'date\','.mktime(12,0,0,date('n',$this->date)  ,date('d',$this->date),date('Y',$this->date)-1).']]);',
            '__NEXT_YEAR__' => 'org.sygil.ajax.load(\''.$this->key.'\',\'panel_right_row1\',\'replace\',[[\'module\',\''.$this->module.'\'],[\'date\','.mktime(12,0,0,date('n',$this->date)  ,date('d',$this->date),date('Y',$this->date)+1).']]);',
        );

//echo Template::getInstance()->get('calendar',$data,'calendar');
        return Template::getInstance()->get('calendar',$data,'org.sygil.calendar');
  }
}

?>
