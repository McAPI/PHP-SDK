<?php

namespace McAPI\Endpoint;

abstract class Endpoint {

    private $result = array();

    private $created;
    private $expires;

    private $cached = false;

    public function __construct(array $result) {

        $this->setData($result);

    }

    /**
    * Executes the request.
    */
    abstract public function execute();

    /**
    * Returns the complete data set
    * @return Returns an array with all datas from the API request.
    */
    public function getData($path = null) {

        if($path === null) {
            return $this->result;
        }

        $parts = explode('.', $path);
        $value = $this->result;

        foreach($parts as $part) {

            if(!(array_key_exists($part, $value))) {
                return null; //Entry doesn't exist
            }

            $value = $value[$part];

        }

        return $value;
    }

    /**
    * Checks if the value has been cached at McAPI.
    *
    * @return boolean true if it is in the cache, otherwise false.
    */
    public function cached() {
        return $this->cached;
    }

    /**
    * Returns a \DateTime object containing the time when the data has been cached.
    * @return \DateTime when the data is cached, otherwise false.
    */
    public function getCreatedDate() {
        return $this->created;
    }

    /**
    * Returns a \DateTime object containing the time when the data expires.
    * @return \DateTime when the data is cached, otherwise false.
    */
    public function getExpiresDate() {
        return $this->created;
    }

    public function setData(array $result) {

        $this->result = $result;

        $this->cached = array_key_exists('updated', $result);

        if($this->cached) {
            $this->created = new \DateTime($result['updated']['time'], new \DateTimeZone($result['updated']['zone']));
            $this->expires = new \DateTime($result['updated']['expires'], new \DateTimeZone($result['updated']['zone']));
        }

    }

}
