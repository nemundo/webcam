<?php

namespace Nemundo\Webcam\Reader\Webcam;

use Nemundo\Webcam\Data\Webcam\WebcamReader;

class WebcamDataReader extends WebcamReader
{

    use WebcamFilter;

    public function getData()
    {

        $this->loadFilter();

        return parent::getData();

    }

}