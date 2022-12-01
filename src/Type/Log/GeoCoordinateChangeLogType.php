<?php

namespace Nemundo\Webcam\Type\Log;

use Nemundo\Webcam\Data\GeoCoordinateChangeLog\GeoCoordinateChangeLog;
use Nemundo\Webcam\Data\GeoCoordinateChangeLog\GeoCoordinateChangeLogReader;
use Nemundo\Webcam\Data\PublicationStatusLog\PublicationStatusLogReader;

class GeoCoordinateChangeLogType extends AbstractLog
{

    protected function loadLog()
    {


    }


    public function getText($dataId)
    {


        $reader = new GeoCoordinateChangeLogReader();
        $dataRow = $reader->getRowById($dataId);

        $text = 'Änderung von ' . $dataRow->geoCoordinateOld->getText() . ' nach ' . $dataRow->geoCoordinateNew->getText();

        return $text;

    }

}