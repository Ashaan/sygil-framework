<?php

class Css {
    static public $GEN_CLEAN  = 1;
    static public $GEN_LINE   = 2;

    protected function getLine($key,$value,$genMode=0) {
        if (!$key || !$value) return null;

        $result = '';
        if ($genMode&Css::$GEN_CLEAN) {
            $result = $key;
            for ($i=strlen($result);$i<=20;$i++) $result .= ' ';
            $result .= ': '.$value.';';
        } else {
            $result = $key.':'.$value.';';
        }

        if ($genMode&Css::$GEN_LINE) {
            $result.CRLF;
        }

        return $result;
    }
    public function getCSS($genMode=0) {
        return null;
    }
}

?>
