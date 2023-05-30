<?php

namespace Nemundo\Webcam\Content\Webcam;

use Nemundo\Content\Index\Geo\Type\GeoIndexTrait;
use Nemundo\Content\Type\AbstractContentItem;
use Nemundo\Webcam\Data\Image\ImageDelete;
use Nemundo\Webcam\Data\Webcam\WebcamReader;
use Nemundo\Webcam\Data\Webcam\WebcamRow;
use Nemundo\Webcam\Import\WebcamImageImport;

class WebcamItem extends AbstractContentItem
{

    use GeoIndexTrait;

    protected function loadItem()
    {
        $this->contentType = new WebcamType();
    }

    protected function onDataRow()
    {
        $reader = new WebcamReader();
        $reader->model->loadSource();
        $reader->model->loadRegion();
        $reader->model->loadLatestImage();
        $this->dataRow= $reader->getRowById($this->dataId);
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


    public function deleteImage() {

        $delete = new ImageDelete();
        $delete->filter->andEqual($delete->model->webcamId,$this->dataId);
        $delete->delete();

        return $this;

    }


    public function importImage() {

        //$webcamRow = (new WebcamItem($webcamId))->getDataRow();
        (new WebcamImageImport())->importImgae($this->getDataRow());

        return $this;

    }


}