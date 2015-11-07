<?php

namespace McAPI\Endpoint;

use McAPI\Curl as Curl;

class Votifier extends Endpoint {

    private $ip;
    private $username;
    private $key;
    private $port;

    public function __construct($ip, $username, $key, $port = 25565) {

        parent::__construct(array());

        $this->ip = $ip;
        $this->username = $username;
        $this->key = $key;
        $this->port = $port;

    }

    public function execute() {

        parent::setData(Curl::post(
            'votifier',
            array(
                'ip'        => $this->ip,
                'port'      => $this->port,
                'username'  => $this->username,
                'key'       => $this->key
            )
        ));

    }

    public function successfully() {
        return parent::getData('result.status') == 'SUCCESSFULLY';
    }

}
