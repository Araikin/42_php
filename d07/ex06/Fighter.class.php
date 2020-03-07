<?php
class Fighter {
    private $_fighter;

    function __construct($fighter) {
        $this->_fighter = $fighter;
    }

    public function __get($arg) {
        if ($arg == 'name')
            return $this->_fighter;
    }
}
?>
