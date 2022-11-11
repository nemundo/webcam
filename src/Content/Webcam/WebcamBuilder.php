<?php

namespace Nemundo\Webcam\Content\Webcam;

use Nemundo\Content\Type\AbstractContentBuilder;
use Nemundo\Core\Type\Geo\GeoCoordinate;
use Nemundo\Core\Type\Geo\GeoCoordinateAltitude;
use Nemundo\Webcam\Data\Source\Source;
use Nemundo\Webcam\Data\Source\SourceId;
use Nemundo\Webcam\Data\Webcam\Webcam;
use Nemundo\Webcam\Data\Webcam\WebcamId;

class WebcamBuilder extends AbstractContentBuilder
{

    public $webcam;

    public $description;

    public $imageUrl;

    public $source;

    public $sourceUrl;

    /**
     * @var GeoCoordinate
     */
    public $geoCoordinate;


    protected function loadBuilder()
    {
        $this->contentType = new WebcamType();
        $this->geoCoordinate = new GeoCoordinate();  // new GeoCoordinateAltitude();
    }

    protected function onCreate()
    {

        $data = new Source();
        $data->updateOnDuplicate=true;
        $data->source=$this->source;
        $data->url=$this->sourceUrl;
        $data->save();

        $id = new SourceId();
        $id->filter->andEqual($id->model->source,$this->source);
        $sourceId = $id->getId();

        $data=new Webcam();
        $data->updateOnDuplicate=true;
        $data->webcam=$this->webcam;
        $data->description=$this->description;
        $data->imageUrl=$this->imageUrl;
        $data->geoCoordinate=$this->geoCoordinate;
        $data->sourceId = $sourceId;
        $data->save();


        $id = new WebcamId();
        $id->filter->andEqual($id->model->imageUrl,$this->imageUrl);
        $this->dataId = $id->getId();



    }

    protected function onUpdate()
    {
    }
}