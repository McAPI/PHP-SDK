<?php

namespace McAPI\Endpoint;

use McAPI\Curl as Curl;

use McAPI\Game\GameVersion as GameVersion;

class GameVersions extends Endpoint {

    private $versions;

    public function __construct() {

        parent::__construct(array());

    }

    public function execute() {

        parent::setData(Curl::get('game/versions'));

        foreach(parent::getData('versions.list') as $version) {

            $this->versions[] = new GameVersion($version['id'], $version['releaseTime'], $version['type']);

        }

    }


    /**
    * Returns an array with all versions.
    * @return \McAPI\Game\GameVersion[]
    */
    public function getVersions() {

        return $this->versions;

    }

    /**
    * Returns a specified version.
    * @param $value the version id
    * @return \McAPI\Game\GameVersion
    */
    public function getVersion($value) {

        foreach($this->getVersions() as $version) {

            if($version->getVersion() == $value) {
                return $version;
            }

        }

        return null;

    }

}
