<?php

namespace Nemundo\Webcam\Reader\Source;

use Nemundo\Webcam\Data\Source\SourceReader;

class SourceDataReader extends SourceReader
{

    public function getData()
    {
        $this->addOrder($this->model->source);
        return parent::getData();
    }

}