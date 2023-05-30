<?php

namespace Nemundo\Webcam\Reader\Region;

use Nemundo\Webcam\Data\Region\RegionReader;

class RegionDataReader extends RegionReader
{

    public function getData()
    {

        $this->addOrder($this->model->region);
        return parent::getData();

    }

}