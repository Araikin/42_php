<?php

require_once 'Color.class.php';

class Vertex {
    private $_x, $_y, $_z, $_w = 1.0, $_color;
    static $verbose = FALSE;

    function __construct( array $kwargs ) {
        if (isset($kwargs['x']) && isset($kwargs['y']) && isset($kwargs['z'])) {
            if (isset($kwargs['w']))
                $this->_w = $kwargs['w'];
            $this->_x = $kwargs['x'];
            $this->_y = $kwargs['y'];
            $this->_z = $kwargs['z'];
            if (isset($kwargs['color']))
                $this->_color = $kwargs['color'];
            else
                $this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
        }
        if (self::$verbose)
            echo $this . " constructed\n";
    }

    public function getX() { return $this->_x; }
    public function getY() { return $this->_y; }
    public function getZ() { return $this->_z; }
    public function getW() { return $this->_w; }
    public function getColor() { return $this->_color; }

    public function setX($arg) { $this->_x = $arg; }
    public function setY($arg) { $this->_y = $arg; }
    public function setZ($arg) { $this->_z = $arg; }
    public function setW($arg) { $this->_w = $arg; }
    public function setColor($arg) { $this->_color = $arg; }


    function __destruct() {
        if (self::$verbose)
            echo $this . " destructed\n";
    }

    function __toString() {
        if (self::$verbose)
            return sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s)",
                $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
        else
            return sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )",
                $this->_x, $this->_y, $this->_z, $this->_w);
    }

    static function doc() {
        return (file_get_contents('Vertex.doc.txt') . "\n");
    }
}
?>