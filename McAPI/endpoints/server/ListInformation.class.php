<?php

namespace McAPI\Server;

class ListInformation {

    private $motd;
    private $favicon;
    private $ping;

    public function __construct($motd, $favicon, $ping) {
        $this->motd     = $motd;
        $this->favicon  = $favicon;
        $this->ping     = $ping;
    }

    /**
    * Returns the motd of the server.
    * @return string
    */
    public function getMotd() {
        return $this->motd;
    }

    /**
    * Returns the favion as a base64 encoded string.
    * @return string
    */
    public function getFavicon() {
        return $this->favicon;
    }

    /**
    * Returns the ping of the server.
    * @return int
    */
    public function getPing() {
        return $this->ping;
    }

}
