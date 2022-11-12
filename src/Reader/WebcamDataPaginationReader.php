<?php

namespace Nemundo\Webcam\Reader;

use Nemundo\Webcam\Data\Webcam\WebcamPaginationReader;
use Nemundo\Webcam\Data\Webcam\WebcamReader;
use Nemundo\Webcam\Reader\Filter\WebcamFilter;

class WebcamDataPaginationReader extends WebcamPaginationReader
{

    use WebcamFilter;

    public function getData()
    {

        $this->loadFilter();

        /*$this->model->loadSource();
        $this->addOrder($this->model->webcam);*/

        return parent::getData();

    }

}