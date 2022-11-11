<?php

namespace Nemundo\Webcam\Content\Webcam;

use Nemundo\Content\Index\Geo\Type\GeoIndexTrait;
use Nemundo\Content\Type\AbstractContentItem;
use Nemundo\Webcam\Data\Webcam\WebcamReader;
use Nemundo\Webcam\Data\Webcam\WebcamRow;

class WebcamItem extends AbstractContentItem
{

    use GeoIndexTrait;

    protected function loadItem()
    {
        $this->contentType = new WebcamType();
    }

    protected function onDataRow()
    {
        $this->dataRow=(new WebcamReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|WebcamRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->webcam;
    }


    public function getGeoCoordinate()
    {
        return $this->getDataRow()->geoCoordinate;
    }

}