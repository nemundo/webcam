<?php

namespace Nemundo\Webcam\Reader;

use Nemundo\Webcam\Data\Webcam\WebcamReader;

class WebcamDataReader extends WebcamReader
{

    public function getData()
    {

        $this->model->loadSource();
        return parent::getData();

    }

}