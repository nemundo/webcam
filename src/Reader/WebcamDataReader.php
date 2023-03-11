<?php

namespace Nemundo\Webcam\Reader;

use Nemundo\Webcam\Data\Webcam\WebcamReader;
use Nemundo\Webcam\Reader\Filter\WebcamFilter;

class WebcamDataReader extends WebcamReader
{

    use WebcamFilter;

    public function getData()
    {

        $this->loadFilter();

        //$webcamReader->model->loadSource();

        //$this->model->loadSource();
        //$this->addOrder($this->model->webcam);*/

        return parent::getData();

    }

}