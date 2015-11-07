<?php

namespace McAPI\Endpoint;

use McAPI\Curl as Curl;

use McAPI\Game\GameService as GameService;

class GameStatus extends Endpoint {

    private $service;

    private $status;
    private $description;

    public function __construct($service) {

        parent::__construct(array());

        if(!(GameService::exists($service))) {
            throw new \IllegalArgumentException("{$service} is an invalid GameService.");
        }

        $this->service = $service;

    }

    public function execute() {

        parent::setData(Curl::get(
            'game/status',
            array(
                $this->service
            )
        ));

        $this->status = strtolower(parent::getData('service.status'));
        $this->description = parent::getData('service.description');

    }

    public function getStatus() {

        if($this->status == 'green') {
            return 'online';
        }

        if($this->status == 'yellow') {
            return 'unstable';
        }

        if($this->status == 'red') {
            return 'offline';
        }

        return $this->status;
    }

    public function getDescription() {
        return $this->description;
    }

}
