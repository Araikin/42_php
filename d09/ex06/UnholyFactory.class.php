<?php
class UnholyFactory {

    private $_types = [];

    function absorb($soldier) {
        if ($soldier instanceof Fighter)
            if (array_key_exists($soldier->name, $this->_types))
                echo "(Factory already absorbed a fighter of type $soldier->name )\n";
            else {
                $this->_types[$soldier->name] = $soldier;
                echo "(Factory absorbed a fighter of type " . $soldier->name . ")\n";
            }
        else
            echo "(Factory can't absorb this, it's not a fighter)\n";
    }

    public function fabricate($fighter) {
        if (array_key_exists($fighter, $this->_types)) {
            echo "(Factory fabricates a fighter of type " . $fighter . ")\n";
            return (clone $this->_types[$fighter]);
        }
        else
            echo "(Factory hasn't absorbed any fighter of type " . $fighter . ")\n";
    }
}
?>
