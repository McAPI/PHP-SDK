<?php

namespace McAPI\Endpoint;

protected class Endpoint {

    private $result = array();

    private $created;
    private $expires;

    private $cached = false;

    public function __construct(array $result) {

        $this->setDat($result);

    }

    /**
    * Returns the complete data set
    * @return Returns an array with all datas from the API request.
    */
    public function getResult() {
        return $this->result;
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

        $this->cached = array_key_exists('updated', $result);

        if($this->cached) {
            $this->created = new \DateTime($result['updated']['time'], \DateTimeZone::EUROPE);
            $this->expires = new \DateTime($result['updated']['expires'], \DateTimeZone::EUROPE);
        }

    }

}
