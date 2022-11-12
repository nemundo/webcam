<?php

namespace Nemundo\Webcam\Content\Webcam;

use Nemundo\Content\Type\AbstractContentBuilder;
use Nemundo\Core\Type\Geo\GeoCoordinate;
use Nemundo\Webcam\Data\Source\Source;
use Nemundo\Webcam\Data\Source\SourceId;
use Nemundo\Webcam\Data\Webcam\Webcam;
use Nemundo\Webcam\Data\Webcam\WebcamId;
use Nemundo\Webcam\Data\Webcam\WebcamUpdate;

class WebcamBuilder extends AbstractContentBuilder
{

    public $webcam;

    public $description;

    public $direction;

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
        $this->geoCoordinate = new GeoCoordinate();
    }

    protected function onCreate()
    {

        $hasUrl = false;
        if (($this->sourceUrl !== '') && ($this->sourceUrl !== null)) {
            $hasUrl = true;
        }

        $data = new Source();
        $data->updateOnDuplicate = true;
        $data->source = $this->source;
        $data->hasUrl = $hasUrl;
        $data->url = $this->sourceUrl;
        $data->save();

        $id = new SourceId();
        $id->filter->andEqual($id->model->source, $this->source);
        $sourceId = $id->getId();

        $data = new Webcam();
        $data->updateOnDuplicate = true;
        $data->active = false;
        $data->webcam = $this->webcam;
        $data->description = $this->description;
        $data->direction = $this->direction;
        $data->imageUrl = $this->imageUrl;
        $data->geoCoordinate = $this->geoCoordinate;
        $data->sourceId = $sourceId;
        $data->save();


        $id = new WebcamId();
        $id->filter->andEqual($id->model->imageUrl, $this->imageUrl);
        $this->dataId = $id->getId();

    }


    protected function onUpdate()
    {

        $update = new WebcamUpdate();
        $update->webcam = $this->webcam;
        $update->description = $this->description;
        $update->direction = $this->direction;
        $update->imageUrl = $this->imageUrl;
        $update->geoCoordinate = $this->geoCoordinate;
        //$update->sourceId = $sourceId;
        $update->updateById($this->dataId);

    }

}