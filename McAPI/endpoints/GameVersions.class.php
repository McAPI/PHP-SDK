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

    public function getVersions() {

        return $this->versions;

    }

}
