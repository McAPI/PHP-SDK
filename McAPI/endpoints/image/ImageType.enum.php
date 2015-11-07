<?php

namespace McAPI\Image;

abstract class ImageType {

    const FAVICON = 'FAVICON';

    public static function exists($value) {

        $value = strtoupper($value);

        if($value == self::FAVICON) {
            return true;
        }

        return false;

    }

    public function validate($imageType, $arguments) {

        if(!(self::exists($imageType))) {
            return false;
        }

        if(!(is_array($arguments))) {
            return false;
        }

        if($imageType == self::FAVICON) {
            return array_key_exists('ip', $arguments);
        }

        return false;

    }

}
