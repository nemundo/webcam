<?php

namespace Nemundo\Webcam\Config;

use Nemundo\Core\Type\Geo\GeoCoordinate;

class WebcamConfig
{

    /**
     * @var GeoCoordinate
     */
    public static $defaultGeoCoordinate;

    /**
     * @var int
     */
    public static $inactiveAfterMinute = 30;

    /**
     * @var int
     */
    public static $aspectRatioWidth = 16;

    /**
     * @var int
     */
    public static $aspectRatioHeight = 9;


}