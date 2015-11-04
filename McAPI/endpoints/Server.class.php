<?php

namespace McAPI\Endpoint;

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

        parent::setData(
            
        );

    }

}
