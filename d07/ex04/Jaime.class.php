<?php
class Jaime extends Lannister {
    public function sleepWith($partner) {
        if (get_parent_class($this) === get_parent_class($partner))
            if (get_class($partner) == 'Cersei')
                echo "With pleasure, but only in a tower in Winterfell, then.\n";
            else
                echo "Not even if I'm drunk !\n";
        else
            echo "Let's do this.\n";
    }
}
?>