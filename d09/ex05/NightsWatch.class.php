<?php
class NightsWatch implements IFighter {
    public $fighters = [];

    public function recruit($person) {
        $this->fighters[] = $person;
    }

    public function fight() {
        foreach ($this->fighters as &$fighter)
            if (method_exists(get_class($fighter), "fight"))
                $fighter->fight();
    }
}
?>
