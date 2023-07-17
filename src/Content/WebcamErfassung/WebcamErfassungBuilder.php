<?php

namespace Nemundo\Webcam\Content\WebcamErfassung;

use Nemundo\Content\Builder\IndexBuilder;
use Nemundo\Content\Index\Workflow\Type\Status\AbstractStatusBuilder;
use Nemundo\Content\Type\AbstractContentBuilder;
use Nemundo\ContentTest\App\Gastro\Content\GastroWorkflow\GastroWorkflowItem;
use Nemundo\Core\Type\Geo\GeoCoordinate;
use Nemundo\Webcam\Content\Webcam\WebcamBuilder;
use Nemundo\Webcam\Content\Webcam\WebcamItem;
use Nemundo\Webcam\Content\Webcam\WebcamType;
use Nemundo\Webcam\Data\GeoCoordinateChangeLog\GeoCoordinateChangeLog;
use Nemundo\Webcam\Data\LogItem\LogItem;
use Nemundo\Webcam\Data\PublicationStatusLog\PublicationStatusLog;
use Nemundo\Webcam\Data\Webcam\Webcam;
use Nemundo\Webcam\Data\Webcam\WebcamUpdate;
use Nemundo\Webcam\Data\WebcamErfassung\WebcamErfassung;
use Nemundo\Webcam\Type\Log\PublicationStatusLogType;
use Nemundo\Webcam\Type\Publication\DraftPublication;
use Nemundo\Webcam\Type\Publication\PublishedPublication;

class WebcamErfassungBuilder extends AbstractStatusBuilder
{

    public $publicationStatusId;

    public $webcam;

    public $description;

    public $direction;

    public $imageUrl;

    public $sourceId;

    public $source;

    public $sourceUrl;

    public $regionId;


    /**
     * @var GeoCoordinate
     */
    public $geoCoordinate;


    protected function loadBuilder()
    {
        //$this->contentType = new WebcamType();
        $this->contentType = new WebcamErfassungType();

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


        $builder = new WebcamBuilder();
        $builder->buildContent();

        $dataId = $builder->getDataId();

        $this->workflowId = $builder->getWorkflowId();



        /*$data = new Source();
        $data->updateOnDuplicate = true;
        $data->source = $this->source;
        $data->hasUrl = $hasUrl;
        $data->url = $this->sourceUrl;
        $data->save();

        $id = new SourceId();
        $id->filter->andEqual($id->model->source, $this->source);
        $sourceId = $id->getId();*/


        //$filename = (new CurlWebRequest())->downloadUrl() (new WebcamItem($this->dataId))->getDataRow()->latestImage->image->getFullFilename();

        /*$maxCropping = new MaxImageCropping($filename);
        $maxCropping->aspectRatioWidth = WebcamConfig::$aspectRatioWidth;
        $maxCropping->aspectRatioHeight = WebcamConfig::$aspectRatioHeight;


        $croppingDimension = new CroppingDimension();
        $croppingDimension->width = 100;
        $croppingDimension->height = 100;*/


        $data = new WebcamErfassung();
        //$data->publicationStatusId = $this->publicationStatusId;
        //$data->active = false;
        $data->webcam = $this->webcam;
        $data->description = $this->description;
        //$data->direction = $this->direction;
        $data->imageUrl = $this->imageUrl;
        $data->geoCoordinate = $this->geoCoordinate;
        /*$data->sourceId = $sourceId;
        $data->regionId = $this->regionId;*/
        //$data->croppingImage->saveCroppingDimension($croppingDimension);
        $this->dataId = $data->save();



        $update = new WebcamUpdate();
        $update->publicationStatusId = (new DraftPublication())->id;  //  $this->publicationStatusId;
        $update->active = false;
        $update->webcam = $this->webcam;
        $update->description = $this->description;
        $update->direction = $this->direction;
        $update->imageUrl = $this->imageUrl;
        $update->geoCoordinate = $this->geoCoordinate;
        $update->sourceId = $sourceId;
        $update->regionId = $this->regionId;
        //$update->croppingImage->saveCroppingDimension($croppingDimension);
        $update->updateById($dataId);


        /*$id = new WebcamId();
        $id->filter->andEqual($id->model->imageUrl, $this->imageUrl);
        $this->dataId = $id->getId();*/

        //$logId = $this->saveLog();


        /*$data = new PublicationStatusLog();
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
        $dataId = $data->save();*/


        $processItem = new WebcamItem($dataId);
        (new IndexBuilder())->buildIndex($processItem);


    }


    protected function onUpdate()
    {
    }
}