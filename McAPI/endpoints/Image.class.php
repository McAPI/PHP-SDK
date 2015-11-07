<?php

namespace McAPI\Endpoint;

use McAPI\Curl as Curl;

use McAPI\Image\ImageType as ImageType;

class Image extends Endpoint {

    private $imageType;

    private $image;
    private $arguments;

    public function __construct($imageType, $arguments = array()) {

        parent::__construct(array());
        $this->arguments = $arguments;
        $this->imageType = $imageType;

        if(!(imageType::exists($imageType))) {
            throw new \IllegalArgumentException("{$imageType} is an invalid ImageType.");
        }

        if(!(ImageType::validate($imageType, $arguments))) {
            throw new \IllegalArgumentException("Invalid arguments.");
        }

    }

    public function execute() {

        $value = null;

        if($this->imageType == ImageType::FAVICON) {

            $value = "http://mcapi.de/api/image/favicon/{$this->arguments['ip']}";

            if(array_key_exists('port', $this->arguments)) {
                $value .= "/{$this->arguments['port']}";
            }

            if(array_key_exists('version', $this->arguments)) {

                if(!(array_key_exists('port', $this->arguments))) {
                    $value .= '/25565';
                }

                $value .= "/{$this->arguments['version']}";
            }

        }

        $this->image = $value;

    }

    public function getImage() {

        return $this->image;

    }

}
