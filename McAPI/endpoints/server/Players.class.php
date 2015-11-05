<?php

namespace McAPI\Server;

class Players {

    private $online;
    private $max;

    public function __construct($online, $max) {
        $this->online = $online;
        $this->max = $max;
    }

    /**
    * Returns the amount of slots.
    * @return int
    */
    public function getMax() {
        return $this->max;
    }

    /**
    * Returns the amount of online players.
    * @return int
    */
    public function getOnline() {
        return $this->online;
    }

}
