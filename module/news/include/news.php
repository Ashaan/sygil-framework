<?php

class News {
    private static $Count = 1;
    private $zone  = 0;
    private $panel = null;
    private $date  = null;
    private $event = array();
    private $content = array();

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

    private function getEvent() {
        $config = Core::getInstance()->config['base'];
        $bdd = new mysqli($config['host'],$config['user'],$config['pass'],$config['name']);
        $query  = '
            SELECT N.title, N.text, U.login, N.firstdate
            FROM news N 
              LEFT JOIN user U ON U.id = N.firstauthor 
            WHERE N.zone='.$this->zone.'
              AND N.firstdate >= "'.date('Y-m-d 00:00:00',$this->date).'"
              AND N.firstdate <= "'.date('Y-m-d 23:59:59',$this->date).'"
        ';
        if ($result = $bdd->query($query)) {
            while($obj = $result->fetch_object()){
                $this->event[] = $obj;
            }
        }
    }

    public function generateDaily() {
        $content = '';

        $this->getEvent();
        foreach($this->event as $event) {
            $data = array(
                '__TITLE__'  => $event->title,
                '__AUTHOR__' => $event->login,
                '__DATE__'   => $event->firstdate,
                '__CONTENT__'=> $event->text,
            );
            if ($event->text) {
                $content .= Template::getInstance()->get('long',$data,'news');
            } else {
                $content .= Template::getInstance()->get('short',$data,'news');
            }
        }

        return $content;
    }
}

?>
