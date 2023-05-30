<?php

namespace Nemundo\Webcam\Reader\Webcam;

use Nemundo\Webcam\Data\Webcam\WebcamPaginationReader;

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