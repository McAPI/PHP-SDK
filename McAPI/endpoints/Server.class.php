<?php

namespace McAPI\Endpoint;

use McAPI\Curl as Curl;

use McAPI\Server\Software as Software;
use McAPI\Server\Players as Players;
use \McAPI\Server\ListInformation as ListInformation;

class Server extends Endpoint {

    private $address;
    private $port;
    private $version;

    public function __construct($address, $port = 25565, $version = '1.8') {

        parent::__construct(array());

        $this->address = $address;
        $this->port = $port;
        $this->version = $version;

    }

    /**
    * Returns the software of the server.
    * @return \McAPI\Server\Software
    */
    public function getSoftware() {

        $software = parent::getData('software');

        return new Software($software['name'], $software['version']);
    }

    /**
    * Returns the version of the protocol.
    * @return int
    */
    public function getProtocol() {
        return parent::getData('protocol');
    }

    /**
    * Returns the players of the server.
    * @return \McAPI\Server\Players
    */
    public function getPlayers() {

        $players = parent::getData('players');

        return new Players($players['online'], $players['max']);
    }

    /**
    * Returns the list of the server.
    * @return \McAPI\Server\ListInformation
    */
    public function getList() {

        $list = parent::getData('list');

        return new ListInformation($list['motd'], $list['favicon'], $list['ping']);
    }

    public function execute() {

        parent::setData(Curl::post(
            'server',
            array(
                'ip'        => $this->address,
                'port'      => $this->port,
                'version'   => $this->version
            )
        ));

    }

}
