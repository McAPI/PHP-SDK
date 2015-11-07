<?php

namespace McAPI\Game;

class GameVersion {

    private $version;
    private $releaseTime;
    private $type;

    public function __construct($version, $releaseTime, $type) {

        $this->version = $version;
        $this->releaseTime = new \DateTime($releaseTime);
        $this->type = $type;

    }

    public function getVersion() {
        return $this->version;
    }

    public function getRelease() {
        return $this->release;
    }

    public function getType() {
        return $this->type;
    }

}
