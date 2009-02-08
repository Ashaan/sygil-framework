<?php

class Session {
    static $instance = null;
    private $data;
    private $user = null;

    static function getInstance() {
        if (is_null(Session::$instance)) {
            Session::$instance = new Session();
        }
        return Session::$instance;
    }

    function __construct() {
        session_start();
        $this->initialize();
        $this->login();
        $this->logout();
    }

    function initialize() {
        if (isset($_SESSION) && is_array($_SESSION) && isset($_SESSION['data']) && count($_SESSION['data'])>0) {
            $this->data = $_SESSION['data'];
        } else {
            $this->data = array();
        }

        if (isset($_SESSION) && is_array($_SESSION) && isset($_SESSION['user']) && count($_SESSION['user'])>0) {
            $this->user = $_SESSION['user'];
        }

        foreach ($_POST as $name => $value) {
            if ($name != 'password') {
                $this->data[$name] = $value;
            }
        }   
    }

    function getData($name,$subname=null) {
        if(isset($this->data[$name])) {
            if (!$subname) {
                return $this->data[$name];
            }
            if(isset($this->data[$name][$subname])) {
                return $this->data[$name][$subname];
            }
        }
        return false;
    }

    public function getUser($name) {
        if(isset($this->user[$name])) {
            return $this->user[$name];
        }
        return false;
    }
    public function getUserId() {
        if(isset($this->user['id'])) {
            return $this->user['id'];
        }
        return 0;
    }

    function setData($name,$subname = null,$value = null) {
        if (!is_array($name)) {
            if (!is_null($subname) && !is_null($value)) {
                if (!isset($this->data[$name])) {
                    $this->data[$name] = array();
                }
                $this->data[$name][$subname] = $value;
            } else {
                $this->data[$name] = $subname;
            }
        } else {
            $array = $name;
            foreach ($array as $name => $value) {
                $this->data[$name] = $value;
            }
        }
    }

    function save() {
        if (!session_is_registered('data')) {
            session_register('data');
        }
        $_SESSION['data'] = $this->data;
    
        if ($this->user) {
            if (!session_is_registered('user')) {
                session_register('user');
            }
            $_SESSION['user'] = $this->user;
        }
    }

    function __destruct() {}

    public function isLogged() {
        return !is_null($this->user);
    }

    public function login() {
        if ($this->user) {
            return true;
        }

        if (!$this->getData('username') || !isset($_POST['password'])) {
            return false;
        }

        return $this->loginInternal();
    }

    private function loginInternal() {
        $db = db::getInstance();
        $result = $db->select('
            SELECT *
            FROM {pre}user
            WHERE (login="'.$this->getData('username').'" OR email="'.$this->getData('username').'")
        ');

        if ($result) {
            $result = $result[0];

            $logged = false;
            if ($result['password'] == 'pam') {
                $err = error_reporting(0);

                $mbox = imap_open("{localhost:143/notls}INBOX", $result['sys_user'],$_POST['password']);
                if ($mbox) {
                    imap_close($mbox);
                    $logged = true;
                } else {
                    $logged = false;
                }

                error_reporting($err);

//                if (variable_get('pam_auth_enabled', 0) == 0) {
//                    echo 'PAM desactiver';
//                }
//                if (!pam_auth($$result['user'],$_POST['password'], &$error)) {
//                    var_dump($error);
//                }
            } else {
                $logged = ($result['password'] == md5($_POST['password']));
            }
            unset($result['password']);

            if ($logged) {
                session_destroy();
                session_start();
                $this->data = array();
                $this->initialize();      
                $this->user = $result;
                return true;
            }
        }
        return false;
    }

    private function logout() {
        if ($_GET['disconnect']) {
            session_destroy();
            session_start();
            $this->data = array();
            $this->user = null;
            $this->initialize();      
        }
    }
}

?>
