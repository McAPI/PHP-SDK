<?php

namespace McAPI\Server;

class Software {

    private $name;
    private $version;

    public function __construct($name, $version) {
        $this->name = $name;
        $this->version = $version;
    }

    /**
    * Returns the name of the software.
    * @return string
    */
    public function getName() {
        return $this->name;
    }

    /**
    * Returns the version of the software.
    * @return float
    */
    public function getVersion() {
        return $this->version;
    }

}
