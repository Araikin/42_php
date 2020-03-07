<?php
class Tyrion extends Lannister{
    public function sleepWith($partner) {
        if (get_parent_class($this) === get_parent_class($partner))
            echo "Not even if I'm drunk !\n";
        else
            echo "Let's do this.\n";
    }
}
?>
