<?php

namespace Nemundo\Webcam\Content\Region;

use Nemundo\Content\Type\AbstractContentBuilder;
use Nemundo\Webcam\Data\Region\Region;
use Nemundo\Webcam\Data\Region\RegionUpdate;

class RegionBuilder extends AbstractContentBuilder
{

    public $region;

    protected function loadBuilder()
    {
        $this->contentType = new RegionType();
    }

    protected function onCreate()
    {

        $data = new Region();
        $data->region = $this->region;
        $this->dataId=$data->save();

    }

    protected function onUpdate()
    {

        $update = new RegionUpdate();
        $update->region = $this->region;
        $update->updateById($this->dataId);

    }
}