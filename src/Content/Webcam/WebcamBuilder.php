<?php

namespace Nemundo\Webcam\Content\Webcam;

use Nemundo\Content\Type\AbstractContentBuilder;
use Nemundo\Core\Image\Cropping\CroppingDimension;
use Nemundo\Core\Image\Cropping\MaxImageCropping;
use Nemundo\Core\Type\Geo\GeoCoordinate;
use Nemundo\Web\WebConfig;
use Nemundo\Webcam\Config\WebcamConfig;
use Nemundo\Webcam\Data\GeoCoordinateChangeLog\GeoCoordinateChangeLog;
use Nemundo\Webcam\Data\Log\Log;
use Nemundo\Webcam\Data\LogItem\LogItem;
use Nemundo\Webcam\Data\PublicationStatusLog\PublicationStatusLog;
use Nemundo\Webcam\Data\Webcam\Webcam;
use Nemundo\Webcam\Data\Webcam\WebcamUpdate;
use Nemundo\Webcam\Import\WebcamImageImport;
use Nemundo\Webcam\Type\Log\GeoCoordinateChangeLogType;
use Nemundo\Webcam\Type\Log\PublicationStatusLogType;
use Nemundo\Webcam\Type\Publication\PublishedPublication;

class WebcamBuilder extends AbstractContentBuilder
{

    public $publicationStatusId;

    public $webcam;

    public $description;

    public $direction;

    public $imageUrl;

    public $sourceId;

    public $source;

    public $sourceUrl;

    /**
     * @var GeoCoordinate
     */
    public $geoCoordinate;


    protected function loadBuilder()
    {
        $this->contentType = new WebcamType();

        $this->publicationStatusId = (new PublishedPublication())->id;
        $this->geoCoordinate = new GeoCoordinate();

    }


    protected function onCreate()
    {

        /*$hasUrl = false;
        if (($this->sourceUrl !== '') && ($this->sourceUrl !== null)) {
            $hasUrl = true;
        }*/

        $sourceId = $this->sourceId;


        /*$data = new Source();
        $data->updateOnDuplicate = true;
        $data->source = $this->source;
        $data->hasUrl = $hasUrl;
        $data->url = $this->sourceUrl;
        $data->save();

        $id = new SourceId();
        $id->filter->andEqual($id->model->source, $this->source);
        $sourceId = $id->getId();*/


        $croppingDimension = new CroppingDimension();
        $croppingDimension->width = 100;
        $croppingDimension->height = 100;


        $data = new Webcam();
        $data->publicationStatusId = $this->publicationStatusId;
        $data->active = false;
        $data->webcam = $this->webcam;
        $data->description = $this->description;
        $data->direction = $this->direction;
        $data->imageUrl = $this->imageUrl;
        $data->geoCoordinate = $this->geoCoordinate;
        $data->sourceId = $sourceId;
        $data->croppingImage->saveCroppingDimension($croppingDimension);
        $this->dataId = $data->save();


        /*$id = new WebcamId();
        $id->filter->andEqual($id->model->imageUrl, $this->imageUrl);
        $this->dataId = $id->getId();*/

        $logId = $this->saveLog();


        $data = new PublicationStatusLog();
        $data->logId = $logId;
        //$data->publicationStatusOldId = $webcamOldRow->publicationStatusId;
        $data->publicationStatusNewId = $this->publicationStatusId;
        $dataId = $data->save();


        $data = new LogItem();
        $data->logId = $logId;
        $data->dataId = $dataId;
        $data->text = (new PublicationStatusLogType())->getText($dataId);
        $data->save();


        $data = new GeoCoordinateChangeLog();
        //$data->geoCoordinateOld = n $webcamOldRow->geoCoordinate;
        $data->geoCoordinateNew = $this->geoCoordinate;
        $dataId = $data->save();

        $data = new LogItem();
        $data->logId = $logId;
        $data->dataId = $dataId;
        $data->text = (new GeoCoordinateChangeLogType())->getText($dataId);
        $data->save();

        $webcamRow = (new WebcamItem($this->dataId))->getDataRow();
        (new WebcamImageImport())->importImgae($webcamRow);

        $filename = (new WebcamItem($this->dataId))->getDataRow()->latestImage->image->getFullFilename();

        $maxCropping = new MaxImageCropping($filename);
        $maxCropping->aspectRatioWidth = WebcamConfig::$aspectRatioWidth;
        $maxCropping->aspectRatioHeight = WebcamConfig::$aspectRatioHeight;

        $update = new WebcamUpdate();
        $update->croppingImage->saveCroppingDimension($maxCropping->getCroppingDimension());
        $update->updateById($webcamRow->id);






    }


    protected function onUpdate()
    {

        $webcamOldRow = (new WebcamItem($this->dataId))->getDataRow();


        $update = new WebcamUpdate();
        $update->publicationStatusId = $this->publicationStatusId;
        $update->webcam = $this->webcam;
        $update->description = $this->description;
        $update->direction = $this->direction;
        $update->imageUrl = $this->imageUrl;
        $update->geoCoordinate = $this->geoCoordinate;
        $update->sourceId = $this->sourceId;
        $update->updateById($this->dataId);

        $logId = $this->saveLog();

        if ($webcamOldRow->publicationStatusId !== (int)$this->publicationStatusId) {

            $data = new PublicationStatusLog();
            $data->logId = $logId;
            $data->publicationStatusOldId = $webcamOldRow->publicationStatusId;
            $data->publicationStatusNewId = $this->publicationStatusId;
            $dataId = $data->save();


            $data = new LogItem();
            $data->logId = $logId;
            $data->dataId = $dataId;
            $data->text = (new PublicationStatusLogType())->getText($dataId);
            $data->save();

        }


        if ($webcamOldRow->geoCoordinate->latitude !== $this->geoCoordinate->latitude) {

            $data = new GeoCoordinateChangeLog();
            $data->geoCoordinateOld = $webcamOldRow->geoCoordinate;
            $data->geoCoordinateNew = $this->geoCoordinate;
            $dataId = $data->save();

            $data = new LogItem();
            $data->logId = $logId;
            $data->dataId = $dataId;
            $data->text = (new GeoCoordinateChangeLogType())->getText($dataId);
            $data->save();

        }


    }


    private function saveLog()
    {

        $data = new Log();
        $data->webcamId = $this->dataId;
        $logId = $data->save();

        return $logId;

    }

}