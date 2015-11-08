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

    /**
    * Returns the version id.
    * @return string
    */
    public function getVersion() {
        return $this->version;
    }

    /**
    * Returns the date when this build has been released.
    * @return \DateTime
    */
    public function getReleaseTime() {
        return $this->releaseTime;
    }

    /**
    * Returns the type of release.
    * @return string
    */
    public function getType() {
        return $this->type;
    }

}
