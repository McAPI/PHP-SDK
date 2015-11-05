<?php

namespace McAPI\Endpoint;

use McAPI\Curl as Curl;

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

    public function fetchSimple() {

        parent::setData(Curl::get(
            'server',
            array(
                $this->address,
                $this->port,
                $this->version
            )
        ));

    }

    public function fetchComplex() {

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
