<?php 

class CoreLog {
    public $exceptions = array();
    static private $instance = null;
    static public function getInstance() {
        if (!SygilLog::$instance) {
            SygilLog::$instance = new SygilLog();
        }
        return SygilLog::$instance;
    }
    
    public function add($exception) {
        $this->exceptions[] = $exception;
    }
}

class CoreException extends Exception {
    public function __construct($message, $code = 0, $severity = 0, $filename = __FILE__, $lineno = __LINE__) {
        $this->message = $message;
        $this->code = $code;
        $this->severity = $severity;
        $this->file = $filename;
        $this->line = $lineno;
        SygilLog::getInstance()->add($this);
    }
}

class ErrorHandler extends CoreException {
    protected $severity;
   
    public function __construct($message, $code, $severity, $filename, $lineno) {
        SygilException::__construct($message, $code, $severity, $filename, $lineno);
    }
   
    public function getSeverity() {
        return $this->severity;
    }
}

function exception_error_handler($errno, $errstr, $errfile, $errline ) {
    throw new ErrorHandler($errstr, 0, $errno, $errfile, $errline);
}

set_error_handler("exception_error_handler", E_ALL);

?>